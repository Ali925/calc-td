/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  detail
 *  UTF-8
 */
"use strict";

function CalcDetail(id, number) {
    this.id = id;
    this.number = number;
    this.material = 0;
    this.form = 0;
    this.decorSeries = 0;
    this.decor = 0;
    this.width = 0;
    this.len = 0;
    this.thickness = 0;    
    this.nip = 0; // zaval 
    this.options = {
        side1 : 0,
        side2 : 0,
        side3 : 0,
        side4 : 0,
        angle1 : 0,
        angle2 : 0,
        angle3 : 0,
        angle4 : 0
    };
    this.edges = {
        side1: {
            id : 0,
            msg : '',            
            copy : 0,
            series: 0
        },
        side2: {
            id : 0,
            msg : '',            
            copy : 0,
            series: 0
        },
        side3: {
            id : 0,
            msg : '',           
            copy : 0,
            series: 0
        },
        side4: {
            id : 0,
            msg : '',            
            copy : 0,
            series: 0
        },
        
    };
    this.drawing = null;
    this.blank = 0;
    this.proxyBlanks = [],
    this.realBlank = 0;
    //
    this.specialPrice = 0;
    this.packPrice = 0;   
    this.listPrices = {
        side1 : {name: '', price: 0},
        side2 : {name: '', price: 0},
        side3 : {name: '', price: 0},
        side4 : {name: '', price: 0},
        radius : {cnt : 0, price: 0},
        skos : {cnt : 0, price: 0},
        eurozap : {cnt : 0, price: 0},
        soed : {cnt : 0, price: 0},
        work : 0
    }
    
};

CalcDetail.prototype.setOption = function(key, value) {
    if (this.options.hasOwnProperty(key)) {
        this.options[key] = value;
    }
};

CalcDetail.prototype.checkOptions = function() {
    var el;
    for (el in this.options) {
        if ( (this.options.hasOwnProperty(el)) && (this.options[el] == 0)) {
            return false;
        }
    }
    return true;
};

CalcDetail.prototype.checkEdges = function() {
    var el;
    for (el in this.edges) { 
        if ( (this.edges.hasOwnProperty(el)) && (this.edges[el].msg == '') && (this.edges[el].id == 0)) {
            return false;
        }
    }
    return true;
};

CalcDetail.prototype.count = function() {
    var t, el, cnt = 0;
    for (el in this.edges) {  //edges
        if ( (this.edges.hasOwnProperty(el)) && (this.edges[el].copy != 0)) {
            t = this.edges[el].copy
            this.edges[el].id = this.edges[t].id;
            this.edges[el].series = this.edges[t].series;
        }
    }
    _reset(this.listPrices.radius);
    _reset(this.listPrices.eurozap);
    _reset(this.listPrices.skos);
    _reset(this.listPrices.soed);
    // count
    t = calcData.getForm(this.form);    
    this.listPrices.work = (t) ? +t.price : 0;
    cnt += this.listPrices.work; 
    cnt += _getOpt('s' + this.options.side1, this.listPrices);
    cnt += _getOpt('s' + this.options.side2, this.listPrices);
    cnt += _getOpt('s' + this.options.side3, this.listPrices);
    cnt += _getOpt('s' + this.options.side4, this.listPrices);
    cnt += _getOpt('a' + this.options.angle1, this.listPrices);
    cnt += _getOpt('a' + this.options.angle2, this.listPrices);
    cnt += _getOpt('a' + this.options.angle3, this.listPrices);
    cnt += _getOpt('a' + this.options.angle4, this.listPrices);
    //
    this.listPrices.side1 = _getEdge(this.edges.side1.series, this.len);
    cnt += this.listPrices.side1.price;
    this.listPrices.side2 = _getEdge(this.edges.side2.series, this.width);
    cnt += this.listPrices.side2.price;
    this.listPrices.side3 = _getEdge(this.edges.side3.series, this.len);
    cnt += this.listPrices.side3.price;
    this.listPrices.side4 = _getEdge(this.edges.side4.series, this.width);
    cnt += this.listPrices.side4.price;
    //    
    this.specialPrice = cnt;    
    
    // function
    function _reset(obj) { 
        obj.cnt = 0;
        obj.price = 0;
    }
    
    function _getOpt(type, obj) {
        var tmp, pr;
        if (typeof calcData.options[type] !== "undefined") {
            tmp = calcData.options[type]; 
            obj[tmp.kind].cnt++; 
            pr = + tmp.price;
            obj[tmp.kind].price += pr;
            return pr;
        }
        return 0;
    }
    function _getEdge(series, len) {
        var res = calcData.getEdgeSeries(series);        
        if (res == null) return {name: '', price: 0};
        return {name: res.name, price: Math.ceil(len * res.price / 1000)};
    }
    
};


