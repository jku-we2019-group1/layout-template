let id = 'chart', canvas;
let data, sections;
let numSegments, maxDepth = 0;

let margin = 30, details = 30;
let width, height,
    radii = Array;
let colors = [];
let update = true;

function init(json, element) {
    id = element;
    canvas = document.getElementById(id);
    data = prepareData(json);
    sections = prepareHeadlines(json);
    draw();
}

function prepareData(json) {
    const domains = [];
    json['CompetenceDomains'].forEach((cd) => {
        cd.Competences.forEach((c) => {
            domains.push({id: c['CompetenceID'], name: c['CompetenceName'], degree: c['Degree']});
            maxDepth = Math.max(maxDepth, c['Degree']);
        });
    });
    numSegments = domains.length;

    return domains;
}

function prepareHeadlines(json) {
    const headings = [];
    json['CompetenceDomains'].forEach((cd) => {
        let idx = cd['Competences'][0]['CompetenceID'];
        let short;
        switch (cd['CompetenceDomainID']) {
            case "P":
                short = "Personal";
                break;
            case "S":
                short = "Socio-comm.";
                break;
            case "M":
                short = "Methods/Profession";
                break;
            case "A":
                short = "Activity/Action";
                break;
            default :
                short = "";
        }
        headings[idx] = {
            id: cd['CompetenceDomainID'],
            name: cd['CompetenceDomainName'],
            short: short
        };
    });

    console.log(headings);
    return headings;
}

function setSizes() {
    width = canvas.clientWidth;
    height = width;
    canvas.clientHeight = height;

    rs = Math.floor((width - margin) / 20);
    radii = [2 * rs, 8 * rs, 9.2 * rs, 10 * rs];
}

function draw() {
    update = false;
    setSizes();
    let svg = d3.select('#' + id)
        .append("svg")
        .attr("width", width)
        .attr("height", height);

    let segment = svg.selectAll("g")
        .data(data)
        .enter()
        .append("g")
        .attr("transform", 'translate( ' + width / 2 + ', ' + width / 2 + ')');


    // outer ring
    segment.append("path")
        .attr("class", "arcBlock")
        .attr("id", (d, i) => {
            return "arcBlock_" + d.id;
        })
        .attr("d", d3.arc()
            .innerRadius(radii[2])
            .outerRadius(radii[3])
            .startAngle((d, i) => {
                return phi(i);
            })
            .endAngle((d, i) => {
                return phi(i + 1);
            })
            .padAngle(0.002))
        .style("fill", (d, i) => {
            return color(d, i);
        });

    // inner bars
    segment.append("path")
        .attr("class", "arcBar")
        .attr("d", d3.arc()
            .innerRadius(radii[0])
            .outerRadius((d) => {
                return r(d);
            })
            .startAngle((d, i) => {
                return phi(i);
            })
            .endAngle((d, i) => {
                return phi(i + 1);
            })
            .padAngle(0.002))
        .style("fill", (d, i) => {
            return color(d, i);
        });

    //  draw bounding circles
    radii.forEach((r, i) =>
        svg.append("circle")
            .attr("cx", width / 2)
            .attr("cy", width / 2)
            .attr("r", r)
            .attr("fill", "transparent")
    );

    // add labels
    segment.append("g")
        .attr("text-anchor", (d, i) => {
            return phi(i) < Math.PI ? "end" : "start";
        })
        .attr("transform", (d, i) => {
            return "rotate(" + (360 * (i + 0.5) / numSegments - 90) + ") translate(" + radii[1] * 0.96 + ")";
        })
        .append("text")
        .text((d) => {
            return label(d);
        })
        .attr("transform", (d, i) => {
            return phi(i) >= Math.PI ? "rotate(180)" : "rotate(0)";
        })
        .style("font-size", "1.00rem")
        .attr("dominant-baseline", "mathematical");

    // add headings
    segment.append("text")
        .attr("x", 5)   // Rotate the text from the start angle of the arc
        .attr("dy", -10) //Move the text down
        .append("textPath")
        .attr("xlink:href", function (d, i) {
            return "#arcBlock_" + d.id;
        })
        .text((d) => {
            return domainShort(d);
        })
        .style("font-size", "0.90rem")
        .style("font-weight", "bold")
    //.attr("dominant-baseline", "mathematical");

}

let color = (d, i) => {
    let base = (id) => {
        let sat = (id - 1) % 16;
        switch (Math.floor((id - 1) / 16)) {
            case 0: // rötlich
                return {r: 255, g: 102 + sat * 5, b: 102 + sat * 7};
            case 1: // blau
                return {r: 85 + sat * 7, g: 85 + sat * 7, b: 255};
            case 2: // gelb
                return {r: 255, g: 240, b: 68 + sat * 7};
            default: // grün
                return {r: 68 + sat * 7, g: 255, b: 68 + sat * 7};
        }
    };
    let col = base(d.id);
    return 'rgb(' + col.r + ',' + col.g + ',' + col.b + ')';
};
let phi = (i) => {
    return i * 2 * Math.PI / numSegments;
};
let r = (d) => {
    return Math.abs(d.degree * (radii[1] - radii[0]) / 10 + radii[0]);
};
let label = (d) => {
    return d.name
};
let domainShort = (d) => {
    return (sections[d.id] != null) ? sections[d.id]['short'] : "";
};


