/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  blank
 *  UTF-8
 */

var calcBlank = {
    price : 0,
    items : [],
    add : function(dt) {
        if (this.getById(dt.id) === -1) {
            this.items.push({                
                id: dt.id,
                len : +dt.len,
                width: +dt.width,
                price: +dt.price,
                count: 0,
                rest: []                
            });
        }
        this.items.sort(function(a, b){
            return b.width - a.width; 
        });      
    },
    count: function(list) {
        var i, len = this.items.length;
        var j, l = list.length;
        var ls;
        for(i=0; i<len; i++) {
            ls = [];
            this.items[i].count = 0; 
            this.items[i].rest.splice(0, this.items[i].rest.length);
            for(j=0; j<l; j++) {
                if ((list[j].blank == this.items[i].id) && (list[j].len <= this.items[i].len)){
                    ls.push({idx: j, len: +list[j].len, suit: -1});
                    list[j].realBlank = this.items[i].id;
                }
                //
            };
            this._check(ls, i, list);
        }
        // end
        this.price = 0;
        for(i=0; i<len; i++) {
            this.price += this.items[i].count * this.items[i].price;
        }             
    },
    getById: function(idx) {
       var i, len = this.items.length;
       for (i=0; i<len; i++) {
           if (this.items[i].id == idx) return i;
       }
       return -1;
    },
    _check: function(ls, idx, list) {
        if (ls.length == 0) return;
        ls.sort(function(a, b){
            return b.len - a.len;
        }); 
        //use rest
        var cut = calcConfig.rawCut;
        var i, j, k, rcnt, cnt = ls.length, isInsert;
        var proxyIdx = [], realIdx = [];
        var minLen = ls[cnt - 1].len, maxRest = 0;
        for (i = 0; i<cnt; i++) {
            for(j = 0; j<list[ls[i].idx].proxyBlanks.length; j++) {
                if (proxyIdx.indexOf(list[ls[i].idx].proxyBlanks[j]) == -1) {
                    proxyIdx.push(list[ls[i].idx].proxyBlanks[j]);
                }
            }
        }
        rcnt = proxyIdx.length;
        for (i=0; i<rcnt; i++) {
            k = this.getById(proxyIdx[i]); 
            if (k == -1) continue;
            if (this.items[k].rest.length == 0) continue;
            if (this.items[k].rest[0] < minLen) continue;
            realIdx.push({id: proxyIdx[i], index: k});
            if (maxRest < this.items[k].rest[0]) {
                maxRest = this.items[k].rest[0];
            }
        }
        // use rests
        rcnt = realIdx.length;
        if (rcnt > 0) {
           i = 0;
           while (i<cnt) {
                if (ls[i].len > maxRest) {
                    i++;
                    continue;
                }   
                j = 0; 
                isInsert = false;
                while (j < rcnt) {
                    if (list[ls[i].idx].proxyBlanks.indexOf(realIdx[j].id) == -1) {   
                        j++;
                        continue;
                    } 
                    if (this.items[realIdx[j].index].rest[0] >= ls[i].len) {
                        //insert to do
                        this.items[realIdx[j].index].rest[0] = (this.items[realIdx[j].index].rest[0] == ls[i].len) ? 
                            this.items[realIdx[j].index].rest[0] - ls[i].len : this.items[realIdx[j].index].rest[0] - ls[i].len - cut;
                            
                        //remove item
                        isInsert = true;
                        list[ls[i].idx].realBlank = this.items[realIdx[j].index].id;
                        ls.splice(i, 1);
                        cnt--;
                        // sort 
                        this.items[realIdx[j].index].rest.sort(function(a, b) {
                            return b - a;
                        });
                        if (this.items[realIdx[j].index].rest[0] < minLen) {
                            realIdx.splice(j, 1);
                            rcnt--;
                        } 
                        break;
                    }
                    j++;                  
                } 
                if (rcnt <= 0) break;
                if (! isInsert) {
                   i++; 
                }                
            }
        }
        //other
        if (cnt > 0) {
            this._packing(ls, this.items[idx].len, idx);
        }        
    },
    _packing: function(list, r, idx) {
        var cut = calcConfig.rawCut, i, k, l = list.length;                
        var suits = [];
        var cursor = -1;        
        _add();
        for(i=0; i<l; i++) {
            if (list[i].suit !== -1) continue;
            if (! _place(list[i].len)) {
                _add();
                _place(list[i].len);
            } 
            list[i].suit = cursor;
            for (k = i + 1; k < l; k++) {
                if (suits[cursor] <= 0) break;
                if (_place(list[k].len)) {
                    list[k].suit = cursor;
                }
            }                   
        }
        suits.sort(function(a, b) {
            return b - a;
        });
        this.items[idx].count = suits.length;
        this.items[idx].rest = suits;
        //end          
        function _add() {
            suits.push(r);
            cursor++;
        } 
        function _place(v) {
            if (suits[cursor] == v) {
                suits[cursor] -= v;
                return true;
            } else if (suits[cursor] > v) {
                suits[cursor] -= v + cut;
                return true;
            }
            return false;
        }
    }
}