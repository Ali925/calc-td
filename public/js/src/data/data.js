/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  main data
 *  UTF-8
 */

calcData = {
    materialList : [],
    formList : [],
    edgeSeriesList : [],
    options : {},
    edges : {},
    drawings : {},
    decors : {},
    decorSeries : [],
    nips : [],
    thickness : [],
    initMaterials : function (data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.materialList.push(data[i]);
            }
        }
    },
    initForms : function (data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.formList.push(data[i]);
            }
        }
    },
    initEdge : function (data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.edgeSeriesList.push(data[i]);
            }
        }
    },
    initOptions : function (data) {
        this.options = data;
    },
    initDecorSeries: function(data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.decorSeries.push(data[i]);
            }
        }
    },
    initNips: function(data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.nips.push(data[i]);
            }
        }
    },
    initThickness : function(data) {
        var i, len = data.length;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
                this.thickness.push(data[i]);
            }
        }
    },
    getMaterial : function (id) {
        var i, len = this.materialList.length;
        for(i=0; i<len; i++) {
            if (this.materialList[i].id == id) return this.materialList[i];
        }
        return null;
    },
    getForm : function (id) {
        var i, len = this.formList.length;
        for(i=0; i<len; i++) {
            if (this.formList[i].id == id) return this.formList[i];
        }
        return null;
    },
    getEdgeSeries: function(id) {
        var i, len = this.edgeSeriesList.length;
        for(i=0; i<len; i++) {
            if (this.edgeSeriesList[i].id == id) return this.edgeSeriesList[i];
        }
        return null;
    },
    saveDecor : function(idx, name, img) {
        var id = '' + idx;
        if (typeof this.decors[id] !== 'undefined') return;        
        this.decors[id] = {name: name, img: img};
    },
    getDecor : function (idx) {
        var id = '' + idx;
        if (typeof this.decors[id] !== 'undefined') return this.decors[id];
        return null;
    },
    saveEdges : function (id, name, src) {
        if (typeof this.edges[id] !== 'undefined') return;
        this.edges[id] = {name: name, src: src};
    },
    getEdges : function (id) {
        if (typeof this.edges[id] !== 'undefined') return this.edges[id];
        return null;
    },
    saveDrawing : function(draw) {
        if (typeof this.drawings[draw.id] !== 'undefined') return;        
        this.drawings[draw.id] = {image: draw.image, thumb: draw.thumb};
    },
    getDrawing : function (id) {
        if (typeof this.drawings[id] === 'undefined') return '';
        return this.drawings[id].image;
    },
    getNipName : function (id) {
        var i, len = this.nips.length;
        for(i=0; i<len; i++) {
            if (this.nips[i].id == id) return this.nips[i].name;
        }
        return '';
    }, //Thickness
    getThickness : function (id) {
        var i, len = this.thickness.length;
        for(i=0; i<len; i++) {
            if (this.thickness[i].id == id) return this.thickness[i].name;
        }
        return '';
    }, //Tthickness
    getDecorSeriesName : function (id) {
        var i, len = this.decorSeries.length;
        for(i=0; i<len; i++) {
            if (this.decorSeries[i].id == id) return this.decorSeries[i].name;
        }
        return '';
    }
};
