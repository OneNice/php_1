<li data="<?=$category['alias'] ?>">
    <a href="/cat/<?=$category['alias'];?>"><?=$category['name'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>