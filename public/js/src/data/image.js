/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  image
 *  UTF-8
 */

var calcImages = {
    cache : [],    
    init: function(data, callback) {
        var i, len = data.length;        
        var cnt;
        for (i=0; i<len; i++) {
            if (! $.isEmptyObject(data[i])) {
               this.cache.push({key: data[i].id, src: data[i].path, img: null}); 
            }
        } 
        len = this.cache.length;
        cnt = len;
        for (i=0; i<len; i++) {
            this.cache[i].img = new Image();
            this.cache[i].img.onload = function() {
                cnt--;
                if (cnt == 0) {
                    callback();
                }
            }
            this.cache[i].img.onerror = function() {
                console.log(this.src);
            }
            this.cache[i].img.src = this.cache[i].src;
        }         
    },   
    get: function(key) {
        var i, len = this.cache.length;
        for (i=0; i<len; i++) {
            if (this.cache[i].key == key) {
                return this.cache[i].img;
            }
        }
        return null;       
    }
};