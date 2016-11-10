/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  storage
 *  UTF-8
 */
var calcStorage = {
    material_decor : {},
    form_nip : {},
    currentFN : null,
    currentMFD : null,
    setMaterialDecor: function(material, form, series, callback) {
        var storage = this;
        var key = material + '_' + form + '_' + series;
        if (typeof this.material_decor[key] !== "undefined" ) {
            callback(this.material_decor[key]);
            this.currentMFD = this.material_decor[key];
        } else { 
            $.ajax({
                url: calcConfig.urls.material_decor,
                data: { material: material, decor_series : series, form: form},
                dataType: "json",
                success: function(data){                 
                    storage.material_decor[key] = data;
                    storage.currentMFD = storage.material_decor[key];
                    callback(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });            
        }
    },
    getMaterialFormDecorParams : function() {
        if (this.currentMFD === null) return {};
        return this.currentMFD;
    },
    setFormNip: function(form, nip, callback) {
        var storage = this;
        var key =form + '_' + nip;
        if (typeof this.form_nip[key] !== "undefined" ) {
            callback(this.form_nip[key]);
            this.currentFN = this.form_nip[key];
        } else { 
            $.ajax({
                url: calcConfig.urls.form_nip,
                type: 'POST',
                data: { form: form, nip : nip},
                dataType: "json",
                success: function(data){                 
                    storage.form_nip[key] = data;
                    storage.currentFN = storage.form_nip[key];
                    callback(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });            
        }
    },
    getFormNipParams : function() {
        if (this.currentFN === null) return {};
        return this.currentFN;
    },
    setEdges : function(success, failure) {
        var dt = calcDetailsList.getCurrent();
        if (! dt) return;
        $.ajax({
            url: calcConfig.urls.options,
            type: 'POST',
            data: {material: dt.material, decor: dt.decor, form: dt.form, 
                width: dt.width, len: dt.len, thickness: dt.thickness, nip: dt.nip,
                options: dt.options},
            dataType: "json",
            success: function(data){                 
                if (data.is_draw) {             
                    calcDetailsList.initCurrentEdges(data.edges, data.edge_list);                    
                    calcDetailsList.setCurrentDrawing(data.drawing); 
                    calcDetailsList.setCurrentPackPrice(data.pack)
                    calcDetailsList.setCurrentBlank(data.blank, data.proxy_blank);                    
                    success(calcDetailsList.getCurrentEdges(), data.edge_list);                    
                } else {
                    failure(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        }); 
    }
};
