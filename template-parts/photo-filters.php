<div id="photo-filters">
    <select id="filter-categories">
        <option value="">Catégories</option>
        <?php
        $categories = get_terms('photo_categories');
        foreach ($categories as $category) {
            echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
        }
        ?>
    </select>
    <select id="filter-formats">
        <option value="">Formats</option>
        <?php
        $formats = get_terms('photo_formats');
        foreach ($formats as $format) {
            echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        }
        ?>
    </select>
    <select id="sort-order">
        <option value="desc">Les plus récentes</option>
        <option value="asc">Les plus anciennes</option>
    </select>
</div>