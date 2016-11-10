/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  core
 *  UTF-8
 */
"use strict";
var calcCore = (function(){
    var core = {
        progress : null,
        progress_steps: [],
        stages: [],
        currentBlc : null,
        detail_number : null,
        msg : null,
        modalBg : null,
        init : function() { 
            var cr = this;
            this.progress = $('#calc-js-progress');
            this.msg = $('#calc-js-message-modal');
            $('.calc-step-blc a').each(function() {
                cr.progress_steps.push($(this));
            } );
            this.currentBlc = $('#calc-js-current');
            this.detail_number = $('#calc-js-current-number');
            this.stages.push($('#calc-stage1'));
            this.stages.push($('#calc-stage2'));
            this.stages.push($('#calc-stage3'));
            this.stages.push($('#calc-stage4'));
            this.modalBg = $('.calc-modal-bg');
            //
            stMaterial.init();
            stForm.init();
            stDecor.init();
            stSize.init();
            stPattern.init();
            stBorder.init();
            stTables.init();
            stFihish.init();
            
            this._other();
            //
            calcDetailsList.add();
            //this.currentBlc.removeClass('');
            this.numberBlock(true);
            this.detail_number.text(calcDetailsList.getCurrentNumber());
            this.setStage(0);
            this.toggleStage(-1, 0);
            stMaterial.open();
        },
        setStage : function(num) {
            var i, len = this.progress_steps.length;
            for (i=0; i<len; i++) {
                if (i <= num) {
                    this.progress_steps[i].addClass('calc-step__active');
                } else {
                    this.progress_steps[i].removeClass('calc-step__active');
                }
            }
        },
        toggleStage : function (oldStage, newStage) {
            if (oldStage != -1) {
                this.stages[oldStage].hide();
            }
            if (newStage != -1) {
                this.stages[newStage].show();
            }
        },
        stepProgress: function (oldPrefix, newPrefix, isStage, stage) {
            if (oldPrefix != '') {
                this.progress.removeClass('calc-way__progress__' + oldPrefix);
            }
            if (newPrefix != '') {
                this.progress.addClass('calc-way__progress__' + newPrefix);
            }
            switch (isStage) {
                case 'add' : {
                    this.progress_steps[stage].addClass('calc-step__active');
                    break;
                }
                case 'remove' : {
                    this.progress_steps[stage].removeClass('calc-step__active');
                    break;
                }
            }
        },
        numberBlock: function (flag) {
            if (flag || false) {
                this.currentBlc.removeClass('calc-hidden');
            } else {
                this.currentBlc.addClass('calc-hidden');
            }
        },
        addDetail : function () {
            this._jumpDetail();
            
        }, 
        editDetail : function () {
            this._jumpDetail();            
        },
        _jumpDetail : function () {
            this.numberBlock(true);
            this.detail_number.text(calcDetailsList.getCurrentNumber());
            this.setStage(0); 
            this.toggleStage(2, 0);
            this.progress.removeClass('calc-way__progress__3');
            stMaterial.checkedOpen(calcDetailsList.getCurrentMaterial());
        }, 
        _other : function() {
            var cr = this;
            $('.calc-modal-close').on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parents('.calc-js-modal-parent').hide();  
                cr.modalBg.hide();
            });            
        },
        showMsg : function(txt) {
            this.msg.find('#calc-js-message-text').text(txt);
            this.msg.show();
            this.modalBg.show();
        }
    };
    ///////////
    var stMaterial = {
        block : null,
        next : null,
        isItem : false,
        elems : null,
        init: function() {
            var mt = this;
            this.block = $('#calc-js-step1_1');
            this.next = this.block.find('#calc-js-step1_1-next');
            this.elems = this.block.find('.calc-choice-item');
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                if ( (! mt.isItem) || (mt.block.hasClass('calc-blc__noactive')) ) return;                
                mt.close();
                stForm.checkedOpen(calcDetailsList.getCurrentMaterial());
                core.stepProgress('', '1-1', '');
            });
            this._choice();
        },
        open : function() {
            this.block.removeClass('calc-blc__noactive');
        },        
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen : function (idx) {
            this.isItem = false;
            var mt = this;
            this.elems.each(function(){
                if ($(this).attr('data-id') == idx) {
                    $(this).addClass('calc-choice-item__active');
                    mt.isItem = true;
                } else {
                    $(this).removeClass('calc-choice-item__active');
                }
            });            
            this._setActive();
            this.open();
        },
        _choice : function () {
            var mt = this;
            this.elems.on('click', function(event){
                event.preventDefault();
                event.stopPropagation();
                if (mt.block.hasClass('calc-blc__noactive')) return;
                if ($(this).hasClass('calc-choice-item__noactive')) return;
                mt.block.find('.calc-choice-item__active').removeClass('calc-choice-item__active');
                var dt = $(this).addClass('calc-choice-item__active').attr('data-id');
                calcDetailsList.setMaterial(dt); 
                if (! mt.isItem) {
                    mt.isItem = true;
                    mt._setActive();                    
                }                 
        });
        },
        _setActive: function() {
            if (this.isItem) {
                this.next.removeClass('calc-nav__noactive').addClass('calc-nav__active');                
            } else {
                this.next.addClass('calc-nav__noactive').removeClass('calc-nav__active');
            }
        }
    };
    ////////////
    var stForm = {
        block : null,
        next : null,
        prev : null,
        isItem : false,
        init: function() {
            var fr = this;
            this.block = $('#calc-js-step1_2');
            this.next = this.block.find('#calc-js-step1_2-next');
            this.prev = this.block.find('#calc-js-step1_2-prev');
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                if ( (! fr.isItem) || (fr.block.hasClass('calc-blc__noactive')) ) return;                
                fr.close();
                stDecor.checkedOpen();
                core.stepProgress('1-1', '1-2', '');
            });  
            this.prev.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                stMaterial.open();               
                fr.close();                
                core.stepProgress('1-1', '', '');
            });  
            this._choice();
        },
        open : function() {
            this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen : function () {
            this.isItem = false;
            var fr = this;
            var arr = calcDetailsList.getMaterialForms();
            var idx = calcDetailsList.getCurrentForm();
            if ((idx != 0) && ($.inArray('' + idx, arr) == -1)) {
                calcDetailsList.setForm(0);
                idx = 0;
            }
            this.block.find('.calc-choice-item').each(function(){
                var elem = $(this);           
                var dt = elem.attr('data-id'); //
                if ($.inArray(dt, arr) != -1) {
                    elem.removeClass('calc-choice-item__noactive');                   
                } else {
                    elem.addClass('calc-choice-item__noactive');                    
                } 
                if (dt == idx) {
                    elem.addClass('calc-choice-item__active');
                    fr.isItem = true;
                } else {
                    elem.removeClass('calc-choice-item__active');
                }
            });
            if (this.isItem) {
                this.next.addClass('calc-nav__active').removeClass('calc-nav__noactive');
            } else {
                this.next.removeClass('calc-nav__active').addClass('calc-nav__noactive');
            }
            this.block.removeClass('calc-blc__noactive');
        },
        _choice : function () {
            var fr = this;
            this.block.find('.calc-choice-item').on('click', function(event){
                event.preventDefault();
                event.stopPropagation();
                if (fr.block.hasClass('calc-blc__noactive')) return;
                if ($(this).hasClass('calc-choice-item__noactive')) return;
                fr.block.find('.calc-choice-item__active').removeClass('calc-choice-item__active');
                var dt = $(this).addClass('calc-choice-item__active').attr('data-id');
                calcDetailsList.setForm(dt); 
                if (! fr.isItem) {
                    fr.isItem = true;
                    fr.next.removeClass('calc-nav__noactive').addClass('calc-nav__active');
                }                 
            });
        }        
    };
    ///////////// 3
    var stDecor = {
        block : null,
        data_block : null,
        item_block : null,
        btn_open : null,
        next : null,
        prev : null,
        isItem : false,
        init: function() {
            var dc = this;
            this.block = $('#calc-js-step1_3');
            this.next = this.block.find('#calc-js-step1_3-next');
            this.prev = this.block.find('#calc-js-step1_3-prev');
            this.data_block = $('#calc-js-step1_3_modal');
            this.item_block = $('#calc-js-decor_block');
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation(); 
                if ( (! dc.isItem) || (dc.block.hasClass('calc-blc__noactive')) ) return;                
                dc.close();                
                stSize.checkedOpen();
                core.stepProgress('1-2', '2', 'add', 1);
                core.toggleStage(0, 1);
            });  
            this.prev.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                stForm.open();               
                dc.close();                
                core.stepProgress('1-2', '1-1', '');
            });  
            this._choice();
            this.btn_open = $('#calc-js-open-decor-modal');
            this.btn_open.on('click', function(event){
                event.preventDefault();
                event.stopPropagation();
                if (dc.block.hasClass('calc-blc__noactive')) return;
                core.modalBg.show();
                dc.data_block.show();
        });
        },
        open : function() {
            this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen : function () {
            this.isItem = false;    
            var temp, dc = this;
            var arr = calcDetailsList.getDecorSeries();
            var dec = calcDetailsList.getCurrentDecor();
            var s = calcDetailsList.getCurrentDecorSeries();
            if ($.inArray('' + s, arr) == -1) {
                dec = 0; 
                s = 0;
                calcDetailsList.setDecor(0, 0);
            } 
            dec = '' + dec;
            this.data_block.find('.calc-modal-item').each(function(){
                var elem = $(this); 
                var ser = elem.attr('data-series-id');                
                if ($.inArray(ser, arr) != -1) {
                    elem.removeClass('calc-modal-item__noactive');                    
                } else {
                    elem.addClass('calc-modal-item__noactive');
                }  
                if (elem.attr('data-id') == dec) {
                    elem.addClass('calc-modal-item__active');
                    dc.isItem = true;
                } else {
                    elem.removeClass('calc-modal-item__active');
                }                 
            });
            if (dc.isItem) {
                temp = calcData.getDecor(dec);
                if (temp != null) {
                    dc._setItem(temp.name, temp.img);
                    dc.item_block.show();
                    dc.next.addClass('calc-btn__active').removeClass('calc-btn__noactive');
                }                
            } else {
                dc.item_block.hide();
                dc.next.removeClass('calc-btn__active').addClass('calc-btn__noactive');
            }            
            dc.block.removeClass('calc-blc__noactive');
        },
        _setItem : function (name, img) {
            this.item_block.find('#calc-js-decor_img').attr('src', img);
            this.item_block.find('#calc-js-decor_name').text(name);
        },
        _choice : function () {
            var dc = this;
            this.data_block.find('.calc-modal-item').on('click', function(event){
                event.preventDefault();
                event.stopPropagation();
                if (dc.block.hasClass('calc-blc__noactive')) return;
                var el = $(this);
                if (el.hasClass('calc-modal-item__noactive')) return;
                var id = el.attr('data-id');
                var img = el.find('img').not('.calc-modal-check').attr('src');
                var name = el.find('.calc-modal-name').text();
                dc.data_block.find('.calc-modal-item__active').removeClass('calc-modal-item__active');
                calcDetailsList.setDecor(el.attr('data-series-id'), id);
                el.addClass('calc-modal-item__active');
                calcData.saveDecor(id, name, img);
                dc._setItem(name, img);                           
                if (! dc.isItem) {
                    dc.isItem = true;
                    dc.item_block.show();    
                    dc.next.removeClass('calc-btn__noactive').addClass('calc-btn__active');
                }                 
            });
        }
        
    };
    //////////// 4
    var stSize = {
        block : null,
        next : null,
        prev : null,
        widthMin : null,
        widthMax : null,
        widthInfo : null,
        widthSlider : null,
        lengthMin : null,
        lengthMax : null,
        lengthInfo : null,
        lengthSlider : null,
        thick : null,
        zaval : null,
        isThickness : false,
        isNip : false,
        init: function() {
            var sz = this;
            this.block = $('#calc-js-step2_1');
            this.next = this.block.find('#calc-js-step2_1-next');
            this.prev = this.block.find('#calc-js-step2_1-prev');
            this.widthMin = this.block.find('#calc-js-width_info_min');
            this.widthMax = this.block.find('#calc-js-width_info_max');
            this.widthInfo = this.block.find('#calc-js-width_value');
            this.widthSlider = this.block.find('#calc-js-width_slider');
            this.lengthMin = this.block.find('#calc-js-length_info_min');
            this.lengthMax = this.block.find('#calc-js-length_info_max');
            this.lengthInfo = this.block.find('#calc-js-length_value');
            this.lengthSlider = this.block.find('#calc-js-length_slider');
            this.thick = this.block.find('input[name="thick"]');
            this.zaval = this.block.find('input[name="zaval"]');
            
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation(); 
                if (sz.block.hasClass('calc-blc__noactive') || (! sz.isThickness) || (!sz.isNip)) {
                    return;
                }
                sz.close();
                stPattern.checkedOpen();
                core.stepProgress('2', '2-1', '');
            });  
            this.prev.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                stDecor.open();               
                sz.close();                
                core.stepProgress('2', '1-2', 'remove', 1);
                core.toggleStage(1, 0);
            }); 
            this._changer();
           
        },
        open : function() {
            this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen : function () { 
            var w = calcDetailsList.getCurrentWidth();
            var l = calcDetailsList.getCurrentLength();
            var obj = calcDetailsList.getSizes();
            var sz = this;
            this.widthMin.text(obj.min_width + ' мм');
            this.widthMax.text(obj.max_width + ' мм');
            this.lengthMin.text(obj.min_length + ' мм');
            this.lengthMax.text(obj.max_length + ' мм');
            if ((w == 0) || (w > obj.max_width) || (w < obj.min_width)) {
                calcDetailsList.setWidth(obj.min_width);
                this.widthInfo.val(obj.min_width); 
                w = obj.min_width;
            } 
            this.widthSlider.slider("option", "value", w);
            if ((l == 0) || (l > obj.max_length) || (l < obj.min_length) ) {
                calcDetailsList.setLength(obj.min_length);
                this.lengthInfo.val(obj.min_length); 
                l = obj.min_length;
            }
            this.lengthSlider.slider("option", "value", l);
            this.widthSlider.slider("option", "min", obj.min_width);
            this.widthSlider.slider("option", "max", obj.max_width);
            this.lengthSlider.slider("option", "min", obj.min_length);
            this.lengthSlider.slider("option", "max", obj.max_length);              
            calcStorage.setMaterialDecor(calcDetailsList.getCurrentMaterial(), calcDetailsList.getCurrentForm(),
                calcDetailsList.getCurrentDecorSeries(), function(dt){
                    var key, index, cnt = 0;  
                    var cur = calcDetailsList.getCurrentThickness();                      
                    sz.thick.each(function(idx, el){
                        var elem = $(el);
                        if (typeof dt[elem.val()] !== "undefined") {
                            key = elem.val();                            
                            ++cnt;
                            elem.parents('div.calc-radio').removeClass('calc-radio__noactive');
                        } else {
                            elem.parents('div.calc-radio').addClass('calc-radio__noactive');
                        }
                        elem.prop('checked', false);
                    });  
                    if (cnt == 1) {
                        cur = key;
                        calcDetailsList.setThickness(key);
                    } else if (typeof dt[cur] === "undefined") {
                        calcDetailsList.setThickness(0);
                        cur = 0;
                    }                    
                    if (cur == 0) {
                        sz.isThickness = false;
                        sz.isNip = false; 
                        sz._updateHide(sz);
                    } else {
                        sz.thick.filter('[value="' + cur +'"]').prop('checked', true);
                        sz.isThickness = true;
                        sz._updateList(sz, dt[cur]); 
                    }                   
                    // end
                    sz._isNext();
                    sz.block.removeClass('calc-blc__noactive');
                });            
        },       
        _changer : function() {
            var sz = this;
            this.widthSlider.slider({
                step: 10,
                stop: function(event, ui) {
                    if (sz.block.hasClass('calc-blc__noactive')) return;
                    var v = ui.value;
                    sz.widthInfo.val(v);
                    calcDetailsList.setWidth(v);
                }
            });
            this.lengthSlider.slider({
                step: 10,
                stop: function(event, ui) {
                    if (sz.block.hasClass('calc-blc__noactive')) return;
                    var v = ui.value;
                    sz.lengthInfo.val(v);
                    calcDetailsList.setLength(v);
                }
            });
            this.thick.on('change', function() {
                if ( $(this).parents('div.calc-radio').hasClass('calc-radio__noactive')) return false;
                var val = $(this).val();
                calcDetailsList.setThickness(val);  
                sz.isThickness = true;                
                sz._updateList(sz, calcStorage.getMaterialFormDecorParams()[val]);  
                sz._isNext();
            });
            this.zaval.on('change', function() {
                if ( $(this).parents('div.calc-radio').hasClass('calc-radio__noactive') ) return false;
                calcDetailsList.setNip($(this).val());               
                sz.isNip = true; 
                sz._isNext();
            });
        },
        _isNext : function() {
            if ((! this.isThickness) || (! this.isNip)) {
                this.next.addClass('calc-nav__noactive').removeClass('calc-nav__active');
            } else {
                this.next.addClass('calc-nav__active').removeClass('calc-nav__noactive');
            }
        },
        _updateHide : function(th) {
            calcDetailsList.setNip(0);
            th.zaval.each(function() {
                $(this).prop('checked', false).parents('div.calc-radio')
                        .addClass('calc-radio__noactive');
            });            
        },
        _updateList : function (th, list) {      //Nip   
            var n; // = calcDetailsList.getCurrentNip();
            if (list.length == 1) {
                n = list[0];
                calcDetailsList.setNip(n);
            } else {
                n = calcDetailsList.getCurrentNip();
                if ($.inArray(n, list) == -1)  {
                    n = 0;
                    calcDetailsList.setNip(0);
                }
            }    
            n = '' + n;
            th.isNip = false;  
            th.zaval.each(function() {
                var el = $(this);
                var v = el.val();
                if ($.inArray(v, list) == -1) {
                    el.prop('checked', false).parents('div.calc-radio')
                        .addClass('calc-radio__noactive');                    
                } else if (v == n) {
                    th.isNip = true;  
                    el.prop('checked', true).parents('div.calc-radio').removeClass('calc-radio__noactive');                  
                } else {
                    el.prop('checked', false).parents('div.calc-radio').removeClass('calc-radio__noactive');
                }                    
            });                     
        }     
        
    };
    //// 5
    var _Canvas = {
        canvas: null,
        ctx: null,
        background: null,
        images: {
           side1: null,
           side2: null,
           side3: null,
           side4: null,
           angle1: null,
           angle2: null,
           angle3: null,
           angle4: null
        },
        init: function () {
            this.canvas = document.getElementById('calc-js-canvas');
            this.ctx = this.canvas.getContext('2d');
            this.canvas.width = calcConfig.canvasWidth;
            this.canvas.height = calcConfig.canvasHeight;
        },
        _draw: function () {
            var el;
            this.ctx.fillStyle = "white";
            this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);
            if (this.background !== null) {
                this.ctx.drawImage(this.background, 0, 0);
            }
            for(el in this.images) {
                if ( (this.images.hasOwnProperty(el)) && (this.images[el] !== null)) {
                    this.ctx.drawImage(this.images[el], 0, 0);
                }
            }
        },
        setBack: function (img) {
            this.background = img;
            var el;
            for(el in this.images) {
                if (this.images.hasOwnProperty(el)) {
                    this.images[el] = null;
                }
            }            
            this._draw();
        },
        set: function (key, img) {
            var old =  this.images[key];
            this.images[key] = img;
            if (old != img) {
                this._draw();
            }
            
        }
    };
    var stPattern = {
        block : null,
        next : null,
        prev : null,
        options : null,
        //isItem : false,
        init: function() {
            var sp = this;
            this.block = $('#calc-js-step2_2');
            this.next = this.block.find('#calc-js-step2_2-next');
            this.prev = this.block.find('#calc-js-step2_2-prev');
            this.options = this.block.find('input[type="radio"]');
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                if (! calcDetailsList.checkCurrentOptions()) return false;   
                //
                calcStorage.setEdges(
                    function(edges, edge_list) {                   
                        sp.close();                        
                        stBorder.checkedOpen(edges, edge_list);
                        core.stepProgress('2-1', '2-2', ''); 
                    },
                    function(message) {
                        core.showMsg(message);
                    }
                );                
            });  
            this.prev.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                stSize.open();               
                sp.close();                
                core.stepProgress('2-1', '2', '');                
            });             
            _Canvas.init();
            this._change();
        },
        open : function() {
            this.block.removeClass('calc-blc__noactive');
        },        
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen : function() {
            var sp = this; 
            var f = calcDetailsList.getCurrentForm();
            var fm = calcData.getForm(f);
            if ((fm !== null) && (typeof fm.image_id !== "undefined") ) 
                _Canvas.setBack(calcImages.get(fm.image_id));
            calcStorage.setFormNip(f, calcDetailsList.getCurrentNip(), function(data) {               
                var key, items, suit, cnt, val, chd, cur;
                var opt = calcDetailsList.getCurrentOptions();
                for(key in data) {
                    if (data.hasOwnProperty(key)) {
                        suit = data[key];
                        items = sp.options.filter('input[data-place="' + key + '"]');
                        cnt = 0;
                        cur = opt[key];
                        items.each(function() {  
                            var elem = $(this);
                            var v = elem.val();
                            if (typeof suit[v] !== "undefined" ) {
                                ++cnt;
                                val = v;
                                elem.prop("checked", false).parents('.calc-radio').removeClass('calc-radio__noactive');
                            } else {
                                elem.prop("checked", false).parents('.calc-radio').addClass('calc-radio__noactive');
                            }
                        } );
                        // check checked
                        //
                        if (cnt == 1) {
                            cur = val;
                            calcDetailsList.setOptions(key, val);
                        } else if (typeof suit[cur] === "undefined")  {
                            cur = 0;
                            calcDetailsList.setOptions(key, 0);
                        } 
                        if (cur != 0) {
                            items.filter('input[value="' + cur + '"]').prop("checked", true);
                            _Canvas.set(key, calcImages.get(suit[cur]));
                        }                         
                    } 
                }
                //end
                sp._checkNext();
                sp.open();
            });
        },
        _checkNext : function() {
            if (calcDetailsList.checkCurrentOptions()) {                    
                    this.next.addClass('calc-nav__active').removeClass('calc-nav__noactive');
                } else {
                    this.next.removeClass('calc-nav__active').addClass('calc-nav__noactive');
                }
        },
        _change: function () {
            var sp = this;
            this.options.on('change', function() {
                if ( $(this).parents('div.calc-radio').hasClass('calc-radio__noactive')) return false;
                if (sp.block.hasClass('calc-blc__noactive')) return;
                var val = $(this).val();
                var place = $(this).attr("data-place");
                var suit = calcStorage.getFormNipParams();
                calcDetailsList.setOptions(place, val);                
                _Canvas.set(place, calcImages.get(suit[place][val])); 
                sp._checkNext();                              
            });
        }        
    };
    // 6
    var stBorder = {
        block : null,
        next : null,
        prev : null,
        modal : null,
        items : null,
        elems : null,
        key : false,
        isFilled: false,
        //isItem : false,
        init: function() {
            var sb = this;
            this.block = $('#calc-js-step2_3');
            this.next = this.block.find('#calc-js-step2_3-next');
            this.prev = this.block.find('#calc-js-step2_3-prev'); 
            this.modal = $('#calc-js-step2_3_modal');
            this.elems = this.modal.find('.calc-modal-item');
            this.items = this.block.find('.calc-js-border-side');
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();  
                if ($(this).hasClass('calc-btn__noactive')) return;
                calcDetailsList.countPrices();
                sb.close();
                stTables.openDetail();
                core.stepProgress('2-2', '3', 'add', 2);
                core.toggleStage(1, 2);
            });  
            this.prev.on('click', function(event) { 
                event.preventDefault();
                event.stopPropagation();
                stPattern.open();                  
                sb.close();                
                core.stepProgress('2-2', '2-1', '');    
            });
            this._choice();
           
        },
        open : function() { //edges, edge_list
            this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            this.block.addClass('calc-blc__noactive');
        },
        checkedOpen: function(edges, edge_list) { 
            var sb = this; 
            var tmp; 
            sb.isFilled = false;
            sb.items.each(function(idx, element) {
                var elem = $(element);
                var key = elem.attr('data-opt');
                if (edges[key].msg == '') {
                    elem.find('.calc-js-border-msg').addClass('calc-hidden');
                    elem.find('.calc-js-border-btn').removeClass('calc-hidden');
                    if (edges[key].id == 0) {
                        elem.find('.calc-js-border-info').addClass('calc-hidden');
                    } else {
                        tmp = calcData.getEdges(edges[key].id);
                        if (! tmp) return;
                        sb._insertInfo(elem, tmp.src, tmp.name);                        
                    }                    
                } else {
                    elem.find('.calc-js-border-msg').removeClass('calc-hidden').text(edges[key].msg);
                    elem.find('.calc-js-border-btn').addClass('calc-hidden');
                    elem.find('.calc-js-border-info').addClass('calc-hidden');
                }
            });
            sb.elems.each(function(idx, element){
                var elem = $(element);
                var idx = elem.attr('data-id') + '';
                if ( $.inArray(idx, edge_list) ) {
                    elem.removeClass('calc-hidden');
                } else {
                    elem.addClass('calc-hidden');
                }
            });
            sb._checkBtn();
            sb.open();
        },
        _insertInfo : function(blc, src, name) { 
            blc.find('.calc-js-border-info').removeClass('calc-hidden')
                                .find('img').attr('src', src)
                                .end().find('.calc-js-border-name').text(name);
        },
        _checkBtn : function() {
            if(this.isFilled) return;
            if (calcDetailsList.checkCurrentEdges()) { 
                this.isFilled = true;
                this.next.addClass('calc-btn__active').removeClass('calc-btn__noactive');
            } else { 
                this.next.addClass('calc-btn__noactive').removeClass('calc-btn__active');
            }
        },
        _choice : function() {
            var sb = this;
            sb.items.find('.calc-js-border-btn').on('click', function(event){
                event.preventDefault();
                event.stopPropagation();
                var el = $(this);
                if (el.hasClass('calc-hidden')) return;
                sb.key = el.attr('data-opt');
                var dt = calcDetailsList.getCurrentEdges(); 
                var idx = dt[sb.key].id;
                sb.elems.removeClass('calc-modal-item__active');
                if (  +idx !== 0) {
                    sb.elems.filter('[data-id="' + idx + '"]').addClass('calc-modal-item__active');
                }
                core.modalBg.show();
                sb.modal.show();                
            });
            sb.elems.on('click', function(event){ 
                event.preventDefault();
                event.stopPropagation();
                if (! sb.key) return;
                var el = $(this);
                if (el.hasClass('calc-hidden') || el.hasClass('calc-modal-item__noactive')) return;
                sb.elems.filter('.calc-modal-item__active').removeClass('calc-modal-item__active');
                el.addClass('calc-modal-item__active');
                var id = el.attr('data-id');
                var ser = el.attr('data-series-id');
                var name = el.find('.calc-modal-name').text();
                var src = el.find('img:not(.calc-modal-check)').attr('src');
                calcDetailsList.setCurrentEdges(sb.key, id, ser);
                calcData.saveEdges(id, name, src);
                sb._insertInfo(sb.items.filter('[data-opt="' + sb.key +  '"]'), src, name);
                //sb.key = false;
                sb._checkBtn();
            });           
            
        },
        clear: function() {
            this.items.find('.calc-js-border-info').addClass('calc-hidden');
        }
    };
    //// 7
    var stTables = {
        //block : null,
        wrap : null,
        btnAdd : null,
        prFull : null,
        prElem : null,
        prRaw : null,
        prPack : null,
        next : null,
        prev : null,
        add : null,
        //isItem : false,
        init: function() {
            var st = this;
            this.wrap = $('#calc-js-result-list');
            this.btnAdd = $('#calc-js-result-add');
            this.prFull = $('#calc-js-result-full_price');
            this.prElem = $('#calc-js-result-elem_price');
            this.prRaw = $('#calc-js-result-raw_price');
            this.prPack = $('#calc-js-result-pack_price');
            this.next = $('#calc-js-step3-next');
            this.prev = $('#calc-js-step3-prev');
            this.add = $('#calc-js-result-add');
            
            
            this.next.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();                            
                st.close();
                stFihish.open();
                core.stepProgress('3', '4', 'add', 3);
                core.toggleStage(2, 3);
            });
            
            this.add.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                calcDetailsList.add();
                core.addDetail();
            });            
            this.prev.on('click', function(event) { 
                event.preventDefault();
                event.stopPropagation();
                stBorder.open();               
                st.close();                
                core.stepProgress('3', '2-2', 'remove', 2);
                core.toggleStage(2, 1);
            });  
           this._change();
        },
        openDetail: function() {
            var obj = calcDetailsList.getCurrent();
            var blc = calcTemplate.detail(obj);
            if (calcDetailsList.isNew) {
                this.wrap.append(blc);
            } else {
                this.wrap.find('div.calc-js-detail[data-id="' + obj.id +'"]').replaceWith(blc);
            }
            this._insertPrices();
            calcDetailsList.end();
            core.numberBlock(false);
           
        },
        open : function() {
           // this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            //this.block.addClass('calc-blc__noactive');
        },
        _insertPrices : function() {
            this.prFull.text(calcTemplate.format(calcDetailsList.price));
            this.prElem.text(calcTemplate.format(calcDetailsList.priceItems));
            this.prRaw.text(calcTemplate.format(calcDetailsList.priceRaw));
            this.prPack.text(calcTemplate.format(calcDetailsList.pricePack));
        },
        _change : function () {
            var st = this;
            this.wrap.on('click', '.calc-js-btn-edit', function(event) {
                event.preventDefault(); 
                event.stopPropagation();
                var idx = parseInt($(this).parents('.calc-js-detail').attr('data-id'));                
                if (isNaN(idx)) return;
                calcDetailsList.setCurrent(idx);
                core.editDetail();                
            });
            this.wrap.on('click', '.calc-js-btn-delete', function(event) {
                event.preventDefault();
                event.stopPropagation();
                var parent = $(this).parents('.calc-js-detail');
                var idx = parseInt(parent.attr('data-id'));                
                if (isNaN(idx)) return;
                calcDetailsList.remove(idx);
                parent.remove();
                var id, num, i, len = calcDetailsList.list.length;
                for (i=0; i<len; i++) {
                    id = calcDetailsList.list[i].id;
                    num = calcDetailsList.list[i].number;
                    st.wrap.find('div.calc-js-detail[data-id="' + id +'"]').find('span.calc-js-number').text(num);
                }
                st._insertPrices();               
            });
            //core.editDetail();
        }
    };
    //// 8
    var stFihish = {        
        prev : null,       
        init: function() {
            var se = this;             
            this.prev = $('#calc-js-step4-prev');             
            this.prev.on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                stTables.open();               
                se.close();                
                core.stepProgress('4', '3', 'remove', 3);
                core.toggleStage(3, 2);
            }); 
            
        },
        open : function() {
           // this.block.removeClass('calc-blc__noactive');
        },
        close : function() {
            //this.block.addClass('calc-blc__noactive');
        },
        
    };
    
    /////
    return core;
})();
