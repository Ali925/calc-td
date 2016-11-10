/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  start
 *  UTF-8
 */
"use strict";
$(document).ready(function() { 
    $.ajax({
        url: calcConfig.urls.material,
        dataType: "json",
        success: function(data){ 
            calcData.initMaterials(data.materials);
            calcData.initForms(data.forms);
            calcData.initEdge(data.edge_series);
            calcData.initOptions(data.options);
            calcData.initDecorSeries(data.decor_series);
            calcData.initNips(data.nips);
            calcData.initThickness(data.thickness);
            calcImages.init(data.images, function(){
                calcCore.init();
            } );            
        }
    });
    
    
});
