<div class="filt_cat ">
    <h3>Категории</h3>
    <div class="flex flex-wrap">
    <?php foreach ($data as $index=>$val){ ?>
        <div class="filt_cat_item" data="<?=$val['alias'];?>" dataid="<?=$index;?>"><?=$val['name'];?></div>
    <?php } ?>
    </div>
</div>
<div class="filt_price">
    <h3>Цена</h3>
    <div class="f_c">
        <label class="control control--checkbox">Бесплатно
            <input type="checkbox" class="price_free" <?php if(isset($_SESSION['filter']['price_free'])) echo $_SESSION['filter']['price_free'];?>/>
            <div class="control__indicator"></div>
        </label>
        <div class="selector">
            <div class="price-slider">
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="50" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
                <span id="min-price" data-currency="руб." class="slider-price"><?php if(isset($_SESSION['filter']['price_range'])) echo $_SESSION['filter']['price_range'][0]; else echo '1'?></span>
                <span class="seperator">-</span> <span id="max-price" data-currency="руб." data-max="50"  class="slider-price"><?php if(isset($_SESSION['filter']['price_range'])) echo $_SESSION['filter']['price_range'][1]; else echo '50'?></span>
            </div>
        </div>
    </div>
</div>
<div>
    <a class="filter_clear">Очистить фильтр</a>
</div>
<script>
    var filter_category = <?php if(isset($_SESSION['filter']['categories'])) echo json_encode($_SESSION['filter']['categories']); else echo '[]'?>;
    var range_values = <?php if(isset($_SESSION['filter']['price_range'])) echo json_encode($_SESSION['filter']['price_range']); else echo '[1,50]'?>;
</script>
<script src="/js/sidebar.js"></script>