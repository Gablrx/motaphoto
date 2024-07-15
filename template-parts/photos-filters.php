<!-- photo-filters.php -->
<div id="photos-filters">

    <div class="filters-selects">
        <select id="filter-categories" name="filter-categories" class="select2">
            <option value="">CATÉGORIES</option>
            <?php
            $categories = get_terms('photo_categories');
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
            ?>
        </select>
        <select id="filter-formats" name="filter-formats" class="select2">
            <option value="">FORMATS</option>
            <?php
            $formats = get_terms('photo_formats');
            foreach ($formats as $format) {
                echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="sort-select">
        <select id="sort-order" name="sort-order" class="select2">
            <option value="">TRIER PAR</option>
            <option value="desc">Les plus récentes</option>
            <option value="asc">Les plus anciennes</option>
        </select>
    </div>
</div>