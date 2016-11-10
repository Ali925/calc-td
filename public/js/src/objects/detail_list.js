/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  detail_list
 *  UTF-8
 */
"use strict";
var calcDetailsList = {
    list: [],
    current: -1,
    cnt: 0, 
    last_number: 0,
    price: 0,
    priceItems: 0,
    pricePack: 0,
    priceRaw: 0,
    isNew: true,
    add: function () {
        ++this.last_number;
        ++this.cnt;
        this.list.push(new CalcDetail(this.cnt, this.last_number));
        this.current = this.list.length - 1;
        this.isNew = true;
    },    
    remove: function (idx) {        
        var i, len = this.list.length;
        var number = -1;
        for(i=0; i<len; i++) {
            if (this.list[i].id == idx) {
                number = i;
                break;
            }
        }
        if (number == -1) return;
        this.list.splice(number, 1);
        this.current = -1;
        len = this.list.length;
        this.last_number = len;
        for(i=0; i<len; i++) {
            this.list[i].number = i + 1;
        }
        this.countPrices();
        
    },
    end : function () {
        this.current = -1;
        this.isNew = false;
    },
    getCurrent : function () {
        if (this.current === -1) return false;
        return this.list[this.current];
    },
    getCurrentNumber : function () {
       if (this.current === -1) return 0; 
       return this.list[this.current].number;
    },
    setCurrent: function(id) {
        var i, len = this.list.length;
        this.current = -1;
        for(i=0; i< len; i++) {
            if (this.list[i].id == id) {
                this.current = i;
                break;
            }
        }
        this.isNew = false;
    },
    setMaterial: function (materialId) {
        if (this.current === -1) return;        
        this.list[this.current].material = materialId;
    },
    setForm: function (formId) {
        if (this.current === -1) return;
        this.list[this.current].form = formId;
    },
    setDecor: function(seriesId, decorId) {
        if (this.current === -1) return;
        this.list[this.current].decorSeries = seriesId;
        this.list[this.current].decor = decorId;
    },
    setWidth: function (width) {
        if (this.current === -1) return;
        this.list[this.current].width = width;
    },
    setLength: function (len) {
        if (this.current === -1) return;
        this.list[this.current].len = len;
    },
    setNip : function (val) {
        if (this.current === -1) return;
        this.list[this.current].nip = val;
    },
    setThickness : function (val) {
        if (this.current === -1) return;
        this.list[this.current].thickness = val;
    },
    setOptions : function (key, val) {
        if (this.current === -1) return;
        this.list[this.current].setOption(key, val);
    },    
    getCurrentWidth: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].width;
    },
    getCurrentLength: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].len;
    },
    getCurrentForm: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].form;
    },    
    getCurrentNip: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].nip;
    }, 
    getCurrentThickness: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].thickness;
    }, 
    getCurrentOptions: function () {
        if (this.current === -1) return 0;
        return this.list[this.current].options;
    },
    getMaterialForms: function () {
        if ((this.current === -1) || (this.list[this.current].material == 0)) return false;
        var mat = calcData.getMaterial(this.list[this.current].material);
        if (mat == null) return [];
        return mat.forms;
    },
    getDecorSeries: function() {
        if ((this.current === -1) || (this.list[this.current].material == 0)) return false;
        var mat = calcData.getMaterial(this.list[this.current].material);
        if (mat == null) return [];
        return mat.decor_suites;
    },
    getSizes: function() {
        if ((this.current === -1) || (this.list[this.current].material == 0)) return false;
        var mat = calcData.getMaterial(this.list[this.current].material);        
        return mat;
    },
    getCurrentMaterial: function() {
        if (this.current === -1) return 0;
        return this.list[this.current].material;
    }, 
    getCurrentDecorSeries: function() {
        if (this.current === -1) return 0;
        return this.list[this.current].decorSeries;
    },
    getCurrentDecor : function() {
        if (this.current === -1) return 0;
        return this.list[this.current].decor;
    },
    checkCurrentOptions: function() {
        if (this.current === -1) return false;
        return this.list[this.current].checkOptions();
    },
    initCurrentEdges : function (edges, edgesList) { 
        if (this.current === -1) return false;  
        var self = this;
        _update('side1', edges.side1);
        _update('side2', edges.side2);
        _update('side3', edges.side3);
        _update('side4', edges.side4); 
        
        function _update(key, dt) { 
            if (dt.msg == '') {
                var idx =  self.list[self.current].edges[key].id + ''; 
                if ( (idx != '0') && ($.inArray(idx, edgesList) === -1)) {
                    self.list[self.current].edges[key].id = 0;
                    self.list[self.current].edges[key].series = 0;
                }            
                self.list[self.current].edges[key].msg = '';
                self.list[self.current].edges[key].copy = 0;
            } else {
                self.list[self.current].edges[key].id = 0;
                self.list[self.current].edges[key].series = 0;
                self.list[self.current].edges[key].msg = dt.msg;
                self.list[self.current].edges[key].copy = dt.copy;
            }
        }
    },
    getCurrentEdges : function () {
        if (this.current === -1) return false;
        return this.list[this.current].edges;
    },
    setCurrentEdges : function (key, value, series) {
        if (this.current === -1) return false;
        if (this.list[this.current].edges.hasOwnProperty(key)) {
            this.list[this.current].edges[key].id = value;
            this.list[this.current].edges[key].series = series;
        }
    },
    checkCurrentEdges: function() {
        if (this.current === -1) return false;
        return this.list[this.current].checkEdges();
    },
    setCurrentBlank : function(blank, proxy) {
        if (this.current === -1) return false;
        this.list[this.current].proxyBlanks = proxy;
        this.list[this.current].blank = blank.id;
        calcBlank.add(blank);
    },
    setCurrentDrawing : function(draw) {
        if (this.current === -1) return false;
        this.list[this.current].drawing = draw.id;
        calcData.saveDrawing(draw);
    },
    setCurrentPackPrice : function(price) {
        if (this.current === -1) return false;
        this.list[this.current].packPrice = price * 1;        
    },
    countPrices : function() {
        var i, cnt1 = 0, cnt2 = 0, len = this.list.length;
        if (this.current !== -1)  {
            this.list[this.current].count();
        }
        calcBlank.count(this.list);
        for(i=0; i<len; i++) {
            cnt1 += this.list[i].specialPrice;
            cnt2 += this.list[i].packPrice;
        }
        this.priceItems = cnt1;
        this.pricePack = cnt2;
        this.priceRaw = calcBlank.price;
        this.price = this.priceItems + this.pricePack + this.priceRaw;
    }
};   