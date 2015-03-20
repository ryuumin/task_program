(function() {

var graph = new joint.dia.Graph;
var paper = new joint.dia.Paper({
    el: $('#paper-link-snapping'),
    width: 900, height: 600, gridSize: 1,
    model: graph,
    defaultLink: new joint.dia.Link({
        attrs: { '.marker-target': { d: 'M 10 0 L 0 5 L 10 10 z' } }
    }),
    validateConnection: function(cellViewS, magnetS, cellViewT, magnetT, end, linkView) {
        // Prevent loop linking
        return (magnetS !== magnetT);
    },
    // Enable link snapping within 75px lookup radius
    snapLinks: { radius: 75 }
});

//文章内にHTMLを埋め込むやつと連動は厳しいと思われるので、別で入力用ウインドウを用意してそれを随時読み込む

var m1 = new joint.shapes.devs.Model({
    position: { x: 50, y: 50 },
    size: { width: 120, height: 60 },
    inPorts: ['in1'],
    outPorts: ['out'],
    attrs: {
        '.label': { text: 'Model', 'ref-x': .4, 'ref-y': .2 },
        rect: { fill: '#2ECC71' },
        '.inPorts circle': { fill: '#16A085', magnet: 'passive', type: 'input' },
        '.outPorts circle': { fill: '#E74C3C', type: 'output' }
    }
});
graph.addCell(m1);

var m2 = new joint.shapes.devs.Model({
    position: { x: 50, y: 50 },
    size: { width: 60, height: 30 },
    inPorts: [''],
    outPorts: [''],
    attrs: {
        '.label': { text: 'Model', 'ref-x': .4, 'ref-y': .2 },
        rect: { fill: '#2ECC71' },
        '.inPorts circle': { fill: '#16A085', magnet: 'passive', type: 'input' },
        '.outPorts circle': { fill: '#E74C3C', type: 'output' }
    }
});

//var m2 = m1.clone();
m2.translate(300, 0);
graph.addCell(m2);

// First, unembed the cell that has just been grabbed by the user.
paper.on('cell:pointerdown', function(cellView, evt, x, y) {
    
    var cell = cellView.model;

    if (!cell.get('embeds') || cell.get('embeds').length === 0) {
        // Show the dragged element above all the other cells (except when the
        // element is a parent).
        cell.toFront();
    }
    
    if (cell.get('parent')) {
        graph.getCell(cell.get('parent')).unembed(cell);
    }
});

// When the dragged cell is dropped over another cell, let it become a child of the
// element below.
paper.on('cell:pointerup', function(cellView, evt, x, y) {

    var cell = cellView.model;
    var cellViewsBelow = paper.findViewsFromPoint(cell.getBBox().center());

    if (cellViewsBelow.length) {
        // Note that the findViewsFromPoint() returns the view for the `cell` itself.
        var cellViewBelow = _.find(cellViewsBelow, function(c) { return c.model.id !== cell.id });
    
        // Prevent recursive embedding.
        if (cellViewBelow && cellViewBelow.model.get('parent') !== cell.id) {
            cellViewBelow.model.embed(cell);
        }
    }
});

m2.attr('.label/text', 'Model 2');

})();