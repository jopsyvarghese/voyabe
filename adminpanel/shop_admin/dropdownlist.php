<?php
session_start();
//require("configure.php");
include("../../dbclasses/db_category.php");
include("../../dbclasses/db_sub_category.php");
include("../../dbclasses/db_brand.php");
include("../../dbclasses/db_specifications.php");

$cat_obj = new Category();
$sub_cat_obj = new Sub_Category();
$brand_obj = new Brand();
$specification_obj = new Specifications();

if (isset($_REQUEST['maincategory_id'])) {
    $maincategory_id = ($_REQUEST["maincategory_id"] <> "") ? trim($_REQUEST["maincategory_id"]) : "";
    if ($maincategory_id <> "") {
        //echo "<br><br><br>in main category<br><br><br>";

        $cats = $cat_obj->selectbymaincat($maincategory_id);

        if (mysqli_num_rows($cats) > 0) {
            ?>

            <select name="category_id" onchange="showSubCat(this);" class="form-control1" required>
                <option value="">Please Select</option>
                <?php while ($row = mysqli_fetch_array($cats)) { ?>
                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                <?php } ?>
            </select>

            <?php
        }
    }
}

if (isset($_REQUEST['category_id'])) {
    $category_id = ($_REQUEST["category_id"] <> "") ? trim($_REQUEST["category_id"]) : "";
    if ($category_id <> "") {

        $sub_cats = $sub_cat_obj->selectByCat($category_id);

        if (mysqli_num_rows($sub_cats) > 0) {
            ?>

            <select name="sub_cat_id" onchange="showBrand(this);
                                showSpecification(this);" class="form-control1" required>
                <option value="">Please Select</option>
                <?php while ($row = mysqli_fetch_array($sub_cats)) { ?>
                    <option value="<?php echo $row['sub_category_id']; ?>"><?php echo $row['sub_category_name']; ?></option>
                <?php } ?>
            </select>

            <?php
        }
    }
}

if (isset($_REQUEST['subcat_id'])) {
    $subcat_id = ($_REQUEST["subcat_id"] <> "") ? trim($_REQUEST["subcat_id"]) : "";
    if ($subcat_id <> "") {
        $brands = $brand_obj->selectBrandBySubCat($subcat_id);
        if (mysqli_num_rows($brands) > 0) {
            ?>

            <select name="brand_id"  class="form-control1" required>
                <option value="">Please Select</option>
                <?php while ($row = mysqli_fetch_array($brands)) { ?>
                    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_name']; ?></option>
                <?php } ?>
            </select>
            <?php
        }
    }
}

if (isset($_REQUEST['sub_category_id'])) {
    //echo "<br><br><br>in specification<br><br><br>";
    $sub_category_id = ($_REQUEST["sub_category_id"] <> "") ? trim($_REQUEST["sub_category_id"]) : "";
    if ($sub_category_id <> "") {
        $specifications = $specification_obj->selectBySubCatId($sub_category_id);
        if (mysqli_num_rows($specifications) > 0) {
            while ($row = mysqli_fetch_array($specifications)) {
                $_SESSION['spec_ids'] = array();
                $a[] = $row['specification_id'];
                $_SESSION['spec_ids'] = $a;
                ?>
                <div class="row">
                    <div class="col-lg-3"><?php echo $row['specification_name']; ?></div>
                   <div class="col-lg-9"><input type="text" name="specifications[]" class="form-control1" /></div><br><br>
                </div>
                <?php
            }
        }
    }
}
?>