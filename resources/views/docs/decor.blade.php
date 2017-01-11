<div class="container">
    <div class="col-md-10">
        <h4 class="text-success">Этот раздел доступен: Администраторам</h4>

        <div class="col-md-12">
            <div class="col-md-6">
                <ul>
                    <li><a href="#product">Изделие</a>
                        <ul>
                            <li><a href="#product-category">Категории</a>
                                <ul>
                                    <li><a href="#product-category-create">Добавление категории</a></li>
                                    <li><a href="#product-category-edit">Редактирование категории</a></li>
                                    <li><a href="#product-category-delete">Удаление категории</a></li>
                                </ul>
                            </li>
                            <li><a href="#product-decor">Декоры</a>
                                <ul>
                                    <li><a href="#product-decor-create">Добавить декор</a></li>
                                    <li><a href="#product-decor-edit">Редактировать декор</a></li>
                                    <li><a href="#product-decor-delete">Удалить декор</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <li><a href="#edge">Кромки</a>
                        <ul>
                            <li><a href="#edge-category">Категории</a>
                                <ul>
                                    <li><a href="#edge-category-create">Добавление категории</a></li>
                                    <li><a href="#edge-category-edit">Редактирование категории</a></li>
                                    <li><a href="#edge-category-delete">Удаление категории</a></li>
                                </ul>
                            </li>
                            <li><a href="#edge-decor">Декоры</a>
                                <ul>
                                    <li><a href="#edge-decor-create">Добавить декор</a></li>
                                    <li><a href="#edge-decor-edit">Редактировать декор</a></li>
                                    <li><a href="#edge-decor-delete">Удалить декор</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-12" style="height: 5px; background-color: #0b0b0b; margin-top: 50px; margin-bottom: 50px"></div>
            @include('docs.decor.product')
        <div class="col-md-12" style="height: 5px; background-color: #0b0b0b; margin-top: 50px; margin-bottom: 50px"></div>
            @include('docs.decor.edge')
    </div>
</div>