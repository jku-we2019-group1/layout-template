
let id = 'chart', canvas, svg;
let data;
let numSegments, stepSegments = 10, maxDepth = 0;

let margin = 30, details = 30;
let width, height,
    radii = Array;
let colors = [];


function init(json, element) {
    id = element;
    canvas = document.getElementById(id);
    data = restructure(json);
    svg = d3.select('#' + id).append("svg");

    window.addEventListener('resize', () => updateSizes());
    updateSizes();
    draw();
}

function restructure(json) {
    const domains = [];
    json['CompetenceDomains'].forEach((cd) => {
        cd.Competences.forEach((c) => {
            domains.push({id: c['CompetenceID'], name: c['CompetenceName'], degree: c['Degree']});
            maxDepth = Math.max(maxDepth, c['Degree']);
        });
    });

    numSegments = domains.length;
    // console.log(domains);
    // console.log(numSegments);
    // console.log(maxDepth);
    return domains;
}

function updateSizes() {
    width = canvas.clientWidth;
    height = width + details;
    canvas.clientHeight = height;

    rs = Math.floor((width - margin) / 20);
    radii = [2 * rs, 8 * rs, 9.2 * rs, 10 * rs];
    console.log(width);
    console.log(rs);
    console.log(radii);

    svg.attr("width", width).attr("height", height);
}

function draw() {
    // create svg


    let segment = svg.selectAll("g")
        .data(data)
        .enter()
        .append("g")
        .attr("transform", 'translate( ' + width / 2 + ', ' + width / 2 + ')');


    // outer ring
    segment.append("path")
        .attr("class", "arcBlock")
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
    radii.forEach((radius, i) =>
        svg.append("circle")
            .attr("cx", width / 2)
            .attr("cy", width / 2)
            .attr("r", radius)
            .attr("fill", "transparent")
    );

    // add labels
    segment.append("g")
        .attr("text-anchor", (d, i) => {
            return phi(i) >= Math.PI ? "end" : "start";
        }).attr("transform", (d, i) => {
        return "rotate(" + (360 * (i + 0.5) / numSegments - 90) + ") translate(" + radii[0] * 1.06 + ")";
    })
        .append("text")
        .text((d) => {
            return label(d);
        })
        .attr("transform", (d, i) => {
            return phi(i) >= Math.PI ? "rotate(180)" : "rotate(0)";
        })
        .style("font-size", "1.05rem")
        .attr("dominant-baseline", "mathematical");
}

let color = (d, i) => {
    let base = (id) => {
        let sat = id % 16;
        switch (Math.floor(id / 16)) {
            case 0: // roötlich
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

// Append category names
// svg.selectAll(".monthText")
//     .data(monthData)
//     .enter().append("text")
//     .attr("class", "monthText")
//     .attr("x", 5)   //Move the text from the start angle of the arc
//     .attr("dy", 18) //Move the text down
//     .append("textPath")
//     .attr("xlink:href",function(d,i){return "#monthArc_"+i;})
//     .text(function(d){return d.month;});
