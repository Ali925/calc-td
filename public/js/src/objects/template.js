/**  
 * JAVASCRIPT FILE
 *  @author tmtfns@gmail.com 
 *  template
 *  UTF-8
 */
var calcTemplate = {
    detail: function (obj) {
        
        var res = '<div class="calc-info-item calc-js-detail" data-id="' + obj.id;
        res += '"><div class="calc-info-top calc-clearfix"><div class="calc-name calc-info-name">№ изделия в заказе <span class="calc-special calc-js-number">';
        res += obj.number + '</span></div><div class="calc-info-draft"><img src="' + calcData.getDrawing(obj.drawing);
        res += '" alt=""></div></div><div class="calc-info-center"><table class="calc-info-table"><tr class="calc-info-header">';
        res += '<td>Конструкция заготовки <span class="calc-info-price">/ Стоимость, руб</span></td><td>Тип заготовки</td>';
        res += '<td>Серия декора</td><td>Декор заготовки</td><td>Завал</td><td>Толщина, мм</td><td>Длина, мм</td><td>Ширина, мм</td></tr>';
        
        res += '<tr><td><div class="calc-info-text">' + calcData.getForm(obj.form).name;        
        res += '<span class="calc-info-price">/ ' + this.format(obj.listPrices.work);
        res += '</span></div></td><td><div class="calc-info-text">' + calcData.getMaterial(obj.material).name;
        res += '</div></td><td><div class="calc-info-text">' + calcData.getDecorSeriesName(obj.decorSeries);
        res += '</div></td><td><div class="calc-info-text">' + calcData.getDecor(obj.decor).name;
        res += '</div></td><td><div class="calc-info-text">' + calcData.getNipName(obj.nip);
        res += '</div></td><td><div class="calc-info-text">' + calcData.getThickness(obj.thickness);
        res += '</div></td><td><div class="calc-info-text">' + obj.len;
        res += '</div></td><td><div class="calc-info-text">' + obj.width;
        // next row
        res += '</div></td></tr><tr class="calc-info-header"><td>Еврозапил<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Скос<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Стандартное соединение<br>Kол-во <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Радиус<br>Kол-во / Стоимость, руб</td>';
        res += '<td>Кромка по длине детали оборотная сторона 1<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Кромка по ширине детали  правая сторона 2<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Кромка по длине детали лицевая сторона 3<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>';
        res += '<td>Кромка по ширине детали  левая сторона 4<br>Вид <span class="calc-info-price">/ Стоимость, руб</span></td>';
        //
        res += '</tr><tr><td><div class="calc-info-text">' + obj.listPrices.eurozap.cnt;        
        res += '<span class="calc-info-price">/' + this.format(obj.listPrices.eurozap.price);
        res += '</span></div></td><td><div class="calc-info-text">' + obj.listPrices.skos.cnt;
        res += '<span class="calc-info-price">/' + this.format(obj.listPrices.skos.price);        
        res += '</span></div></td><td><div class="calc-info-text">' + obj.listPrices.soed.cnt;
        res += '<span class="calc-info-price">/' + this.format(obj.listPrices.soed.price);
        res += '</span></div></td><td><div class="calc-info-text">' + obj.listPrices.radius.cnt;
        res += '<span class="calc-info-price">/' + this.format(obj.listPrices.radius.price);
        //
        
        res += '</span></div></td><td><div class="calc-info-text">' + obj.listPrices.side1.name;
        res += '</div><span class="calc-info-price">/ ' + this.format(obj.listPrices.side1.price);
        res += '</span></td><td><div class="calc-info-text">' + obj.listPrices.side2.name;
        res += '</div><span class="calc-info-price">/ ' + this.format(obj.listPrices.side2.price);
        res += '</span></td><td><div class="calc-info-text">' + obj.listPrices.side3.name;
        res += '</div><span class="calc-info-price">/ ' + this.format(obj.listPrices.side3.price);
        res += '</span></td><td><div class="calc-info-text">' + obj.listPrices.side4.name;
        res += '</div><span class="calc-info-price">/ ' + this.format(obj.listPrices.side4.price);
        
        res += '</span></td></tr></table></div><div class="calc-btn-blc"><button class="calc-info-btn calc-js-btn-delete calc-info-btn__active">';
        res += '<i class="fa fa-times" aria-hidden="true"></i><span class="calc-nav-text">Удалить</span></button>';
        res += '<button class="calc-info-btn calc-js-btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i>';
        res += '<span class="calc-nav-text" >Редактировать</span></button></div></div>';        
        return res;
    },
    format : function(price) {
        return price + ' руб';
    }
}
