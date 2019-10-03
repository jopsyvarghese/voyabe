<?php

include_once("database.inc.php");

class Products
{

    var $product_id;
    var $maincategory_id;
    var $category_id;
    var $sub_category_id;
    var $product_name;
    var $price;
    var $discount;
    var $description;
    var $rating;
    var $shop_id;
    var $brand_id;
    var $product_date;
    var $main_image;
    var $image1;
    var $image2;
    var $image3;


    function Products()
    {
        session_start();
        $this->database = new Database();
    }

// **********************
// GETTER METHODS
// **********************


    function getproduct_id()
    {
        return $this->product_id;
    }

    function getmaincategory_id()
    {
        return $this->maincategory_id;
    }

    function getcategory_id()
    {
        return $this->category_id;
    }


    function getsub_category_id()
    {
        return $this->sub_category_id;
    }

    function getproduct_name()
    {
        return $this->product_name;
    }

    function getprice()
    {
        return $this->price;
    }


    function getdiscount()
    {
        return $this->discount;
    }


    function getdescription()
    {
        return $this->description;
    }

    function getrating()
    {
        return $this->rating;
    }

    function getshop_id()
    {
        return $this->shop_id;
    }


    function getbrand_id()
    {
        return $this->brand_id;
    }

    function getdetails()
    {
        return $this->details;
    }

    function getproduct_date()
    {
        return $this->product_date;
    }

// **********************
// SETTER METHODS
// **********************


    function setproduct_id($val)
    {
        $this->product_id = $val;
    }

    function setmaincategory_id($val)
    {
        $this->maincategory_id = $val;
    }

    function setcategory_id($val)
    {
        $this->category_id = $val;
    }

    function setsub_category_id($val)
    {
        $this->sub_category_id = $val;
    }

    function setproduct_name($val)
    {
        $this->product_name = $val;
    }

    function setprice($val)
    {
        $this->price = $val;
    }

    function setdiscount($val)
    {
        $this->discount = $val;
    }


    function setdescription($val)
    {
        $this->description = $val;
    }

    function setrating($val)
    {
        $this->rating = $val;
    }

    function setshop_id($val)
    {
        $this->shop_id = $val;
    }

    function setwish_list($val)
    {
        $this->wish_list = $val;
    }

    function setbrand_id($val)
    {
        $this->brand_id = $val;
    }

    function setdetails($val)
    {
        $this->details = $val;
    }

    function setproduct_date($val)
    {
        $this->product_date = $val;
    }

    function setimage1($val)
    {
        $this->image1 = $val;
    }

    function setimage2($val)
    {
        $this->image2 = $val;
    }


    function setimage3($val)
    {
        $this->image3 = $val;
    }

    function setmain_image($val)
    {
        $this->main_image = $val;
    }


    function db_fetchrows($result)
    {
        $this->row = mysqli_fetch_object($result);
        return $this->row;
    }

    function selectimage()
    { //index.php
        $sql = "SELECT * FROM products JOIN product_image ON products.product_id=product_image.product_id where products.sub_category_id='1' GROUP BY product_image.product_id DESC";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectimage1($id)
    { //index.php
        $sql = "SELECT * FROM product_image  where product_id='$id'";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectDetailsById($id)
    { //product-view.php
        $sql = "SELECT * FROM products WHERE product_id='$id' ";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->product_id = $row->product_id;
        $this->product_name = $row->product_name;
        $this->rating = $row->rating;
        $this->price = $row->price;
        $this->description = $row->description;
        $this->discount = $row->discount;
        $this->product_availability = $row->product_availability;
        //$this->payment_details=$row->payment_details;
        $this->shop_id = $row->shop_id;
        $this->category_id = $row->category_id;
        $this->main_image = $row->main_image;
        $this->image1 = $row->image1;
        $this->image2 = $row->image2;
        //$this->details=$row->details;

    }

    function selectBySearchedItem($item)
    { //in search-product-check.php
        $sql = "SELECT * FROM products JOIN brand ON products.brand_id=brand.brand_id JOIN sub_category ON brand.sub_category_id = sub_category.sub_category_id JOIN category ON sub_category.category_id = category.category_id JOIN main_category ON category.maincategory_id = main_category.maincategory_id JOIN shop ON products.shop_id = shop.shop_id WHERE products.product_name like '%$item%' OR products.description like '%$item%' OR brand.brand_name like '%$item%' OR sub_category.sub_category_name like '%$item%' OR category.category_name like '%$item%' OR main_category.maincategory_name like '%$item%' ";
        // echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByMainCategory($sub_category_id)
    {
        $sql = "SELECT * FROM products WHERE maincategory_id ='$sub_category_id'";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAllById($id)
    {
        $sql = "SELECT DISTINCT * FROM products where product_id='$id' GROUP BY product_id";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }


    function selectshope($shop_id)
    {

        $sql = "SELECT * FROM products WHERE shop_id ='$shop_id'";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByShop($id)
    { //shop-details.php
        $sql = "SELECT * FROM products where shop_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAllByDate($min, $max)//deal.php
    {
        $sql = "SELECT * FROM products JOIN todays_deal ON products.product_id=todays_deal.product_id where (price BETWEEN '$min' AND '$max')";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAllByDate1()//index.php
    {
        $sql = "SELECT * FROM products JOIN todays_deal ON products.product_id=todays_deal.product_id";
//echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByProductId($id)
    { // used in productdetails.php,products.php
        $sql = "SELECT * FROM  products WHERE product_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->product_id = $row->product_id;
        $this->product_name = $row->product_name;
        $this->description = $row->description;
        $this->maincategory_id = $row->maincategory_id;
        $this->category_id = $row->category_id;
        $this->sub_category_id = $row->sub_category_id;
        $this->brand_id = $row->brand_id;
        $this->price = $row->price;
        $this->discount = $row->discount;
        $this->rating = $row->rating;
        $this->main_image = $row->main_image;
        $this->image1 = $row->image1;
        $this->image2 = $row->image2;
        $this->image3 = $row->image3;
    }

    function selectByCategory($sub_category_id, $min, $max)
    {  //category-ite.php
        $sql = "SELECT * FROM products WHERE category_id ='$sub_category_id' AND (price BETWEEN '$min' AND '$max')";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }


    function selectdiscount($id)
    {
        $sql = "SELECT DISTINCT * FROM products where sub_category_id='$id' GROUP BY discount ORDER BY discount ASC";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByCategor($category_id, $pid)
    {  //index.php
        $sql = "SELECT * FROM products WHERE category_id ='$category_id' AND  NOT(product_id='$pid')";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAllProducts2()
    {  //menu1.php
        $sql = "SELECT * FROM products WHERE category_id=77";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectdistinctProducts()
    {

        $sql = "SELECT  DISTINCT shop_id,product_id,product_name,price,discount,main_image  FROM products Group BY shop_id DESC LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectdistinctProducts1()
    {

        $sql = "SELECT DISTINCT shop_id,product_id,product_name,price,discount,main_image,maincategory_id FROM products WHERE maincategory_id=4 Group BY shop_id DESC LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectdistinctProducts2()
    {

        $sql = "SELECT DISTINCT shop_id,product_id,product_name,price,discount,main_image,maincategory_id FROM products WHERE maincategory_id=25 Group BY shop_id DESC LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectdistinctProducts3()
    {

        $sql = "SELECT DISTINCT shop_id,product_id,product_name,price,discount,main_image,maincategory_id FROM products WHERE maincategory_id=3 Group BY shop_id DESC LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectdistinctProducts4()
    {

        $sql = "SELECT  DISTINCT product_id,product_name,price,discount,main_image,shop_id,category_id,maincategory_id FROM products  WHERE maincategory_id=22  Group BY shop_id LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }

    function selectdistinctProducts5()
    {

        $sql = "SELECT DISTINCT shop_id,product_id,product_name,price,discount,main_image,maincategory_id FROM products WHERE maincategory_id=30 Group BY shop_id DESC LIMIT 0,10";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;

    }


    function selectAllProducts1()
    {  //menu1.php
        $sql = "SELECT DISTINCT  * FROM products";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectProductsByCat($id)
    {
        $sql = "SELECT * FROM products WHERE category_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectProductsCountByCat($id)
    {
        $sql = "SELECT count(*) FROM products WHERE category_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectProductsByCatPagination($id, $pageno, $limit)
    {
        $lat = isset($_SESSION['lat']) ? $_SESSION['lat'] : "78.3232";
        $long = isset($_SESSION['long']) ? $_SESSION['long'] : "65.3234";
        $distQry = "AND ";
        $distance = 10000;
        if ($lat != "" && $long != "") {
            $distance = 5;
        }

        $sql = "SELECT DISTINCT products.shop_id,products.product_id,products.product_name,products.price,products.discount," .
            "products.main_image,products.maincategory_id,shop.shop_name,(3959 * acos(cos(radians($lat))
            * cos(radians(shop.map_latitude))
            * cos(radians(shop.map_longitude) - radians($long))
            + sin(radians($lat))
            * sin(radians(shop.map_latitude))
        )
    ) AS distance FROM products INNER JOIN
    shop ON products.shop_id=shop.shop_id
    WHERE category_id=$id
    HAVING distance < $distance
    ORDER BY distance
    LIMIT $pageno,$limit";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        if (!$result) {
            printf("Error: %s\n", mysqli_error($this->database->link));
            exit();
        }
        return $result;
    }

    function insert()
    {

        $sql = "INSERT INTO products(maincategory_id,category_id,sub_category_id,product_name,price,discount,description,rating,shop_id,brand_id,main_image,image1,image2,image3,product_date)VALUES ( '$this->maincategory_id','$this->category_id','$this->sub_category_id','$this->product_name','$this->price','$this->discount','$this->description','$this->rating','$this->shop_id','$this->brand_id','$this->main_image','$this->image1','$this->image2','$this->image3',NOW())";
        $result1 = $this->database->query($sql);
        $product_id = mysqli_insert_id($this->database->link);
        //   echo $sql;
        return $product_id;

        // $this->product_id = mysql_insert_id($this->database->link); 

        /* $sql2="INSERT INTO feature(product_id,feature_name,feature_value)VALUES ( '$this->product_id','$this->feature_name','$this->feature_value')";
          $result2 = $this->database->query($sql2); */
        //return $this->shop_id;
    }

    function insert1()
    {

        $sql = "INSERT INTO products(maincategory_id,category_id,sub_category_id,product_name,price,discount,description,rating,shop_id,wish_list,brand_id,adv_or_sell,product_date)VALUES ( '$this->maincategory_id','$this->category_id','$this->sub_category_id','$this->product_name','$this->price','$this->discount','$this->description','$this->rating','$this->shop_id','0','$this->brand_id','1',NOW())";
        $result1 = $this->database->query($sql);
        $product_id = mysqli_insert_id($this->database->link);
        ////echo $sql;
        return $product_id;
    }

    function select($id)
    {
        $sql = "SELECT * FROM products WHERE product_id = $id";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectbyproductid1($id)
    {
        $sql = "SELECT products.product_id,products.product_name, products.description, main_category.maincategory_name, category.category_name, sub_category.sub_category_name, products.price, products.discount, products.rating, products.details,products.brand_id, products.image
FROM  products  JOIN sub_category ON products.sub_category_id = sub_category.sub_category_id
 JOIN main_category ON products.maincategory_id = main_category.maincategory_id JOIN category ON category.category_id = products.category_id WHERE products.product_id='$id'";
        echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectProductByname($name)
    {

        $sql = "SELECT * FROM products WHERE product_name='$name'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }


    function selectbyshopid($id)
    {//sellerproducts.php
        $sql = "SELECT * FROM products WHERE shop_id ='$id'";
        //echo $sql;

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectAllByShopId($id)
    { //used in productdetails.php,product-details.php
        $sql = "SELECT * FROM `products` JOIN shop ON products.shop_id = shop.shop_id WHERE shop.shop_id = '$id'";
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

    function joinbyproductid($id)
    {//sellerproducts.php
        $sql = "SELECT * FROM products JOIN main_category on products.maincategory_id=main_category.maincategory_id JOIN category on products.category_id=category.category_id join sub_category on products.sub_category_id=sub_category.sub_category_id WHERE products.product_id ='$id'";
        //echo $sql;

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByname($i, $id)
    {
        $sql = "SELECT products.product_id,products.product_name, products.price, products.description, products.brand_id ,products.image from products
  WHERE products.product_name='$i' and products.shop_id='$id' GROUP BY products.product_id ";
        ////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }


    function selectByAdvertise($maincategory_id)
    {
        $sql = "SELECT * FROM products WHERE maincategory_id =$maincategory_id and adv_or_sell='1'";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByCurrentDate()
    {
        $sql = "SELECT * FROM products WHERE product_date=CURDATE() LIMIT 2";
////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

//AND (category_id=$category_id) AND (sub_category_id=$sub_category_id)  ,$category_id,$sub_category_id
// **********************
// DELETE
// **********************

    function selectProduct()
    {

        $sql = "SELECT * FROM products WHERE wish_list='1'";

        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByDate()
    {
        $sql = "SELECT * FROM products WHERE product_date=(select MAX(product_date) from products)";
////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function delete($id)
    {
        $sql = "DELETE FROM products WHERE product_id = $id;";
        $result = $this->database->query($sql);
    }

// **********************
// INSERT
// **********************
// **********************
// UPDATE
// **********************

    function selectI($id)
    {
        $sql = "SELECT * FROM products where product_id='$id'";
        //////echo $sql;

        $result = $this->database->Query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);
        $this->maincategory_id = $row->maincategory_id;
        $this->category_id = $row->category_id;
        $this->sub_category_id = $row->sub_category_id;
        $this->product_name = $row->product_name;
        $this->price = $row->price;
        $this->discount = $row->discount;
        $this->brand_id = $row->brand_id;
        $this->description = $row->description;


        $this->product_date = $row->product_date;

    }

    function update($id)
    {
        $sql = " UPDATE products SET  maincategory_id='$this->maincategory_id',category_id='$this->category_id',sub_category_id='$this->sub_category_id',product_name='$this->product_name',price='$this->price',main_image='$this->main_image',image1='$this->image1',image2='$this->image2',image3='$this->image3',description='$this->description',rating='$this->rating',shop_id='$this->shop_id',brand_id='$this->brand_id' WHERE product_id = '$id' ";
////echo $sql;
        $result = $this->database->query($sql);
        return $result;
    }

    function countAllactivityByOrder($i)
    {
        $sql = "SELECT count(*) as prd_count from products where product_name='$i'";
        //////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllactivity($i, $id)
    {
        $sql = "SELECT count(*) as prd_count from products where product_name='$i' and shop_id='$id'";
        //////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectByitem($i)
    {
        $sql = "SELECT products.product_id,products.product_name, products.price, products.description, products.brand_id ,products.image from products
  WHERE products.product_name='$i' GROUP BY products.product_id ";
        ////echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectallitem($limit)
    {
        ///$sql =  "SELECT * from sell_product LEFT JOIN main_category ON sell_product.maincategory_id=maincategory_id.maincategory_id LEFT JOIN category ON sell_product.category_id=category.category_id LEFT JOIN sell_product.sub_category_id=sub_category.sub_category_id LEFT JOIN sell_product.customer_id=signup.customer_id ORDER BY sell_product.product_title";
        // $sql="SELECT * FROM brand LEFT JOIN  products ON brand.brand_id=products.brand_id LEFT JOIN sub_category ON products.sub_category_id = sub_category.sub_category_idLEFT JOIN main_category ON products.maincategory_id = main_category.maincategory_id LEFT JOIN category ON category.maincategory_id = main_category.maincategory_id GROUP BY products.product_id $limit";
        $sql = "SELECT products.product_id,products.product_name, products.price, products.description, products.brand_id ,products.image,products.details from products $limit";
        // //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function updateWishlist($id)
    {
        $sql = " UPDATE products SET  wish_list='1' WHERE product_id ='$id' ";
////echo $sql;
        $result = $this->database->query($sql);
    }

    function countAll()
    {
        $sql = "SELECT count(*) as prd_count from products";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function countAllbyid($id)
    {
        $sql = "SELECT count(*) as prd_count from products where shop_id='$id'";
        $result = $this->database->query($sql);
        $result = $this->database->result;
        return $result;
    }

    function selectbycustomerid($pid)
    {
        $sql = "SELECT products.category_id,products.product_name, products.description, main_category.maincategory_name, category.category_name, sub_category.sub_category_name, products.price, products.discount,products.details, products.brand_id,products.image, products.product_date, shop.shop_name, shop.shop_address, shop.mobile, shop.email, shop.map_latitude, shop.map_longitude from
 products  JOIN  shop ON shop.shop_id=products.shop_id
 JOIN sub_category ON products.sub_category_id = sub_category.sub_category_id
 JOIN main_category ON products.maincategory_id = main_category.maincategory_id

 JOIN category ON category.category_id = products.category_id
  WHERE products.product_id='$pid'";
        //echo $sql;
        $result = $this->database->query($sql);
        $result = $this->database->result;
        $row = mysqli_fetch_object($result);

        $this->product_name = $row->product_name;
        $this->product_date = $row->product_date;
        $this->description = $row->description;
        $this->price = $row->price;
        $this->brand_id = $row->brand_id;
        $this->discount = $row->discount;
        $this->shop_name = $row->shop_name;
        $this->maincategory_name = $row->maincategory_name;
        $this->category_name = $row->category_name;
//////echo "<br>category id".$row->category_id;
//////echo "<br>category name".$row->category_name;
        $this->sub_category_name = $row->sub_category_name;
        $this->shop_address = $row->shop_address;
        $this->mobile = $row->mobile;
        $this->email = $row->email;
        $this->map_latitude = $row->map_latitude;
        $this->map_longitude = $row->map_longitude;
        $this->image = $row->image;
        $this->details = $row->details;
    }

    function selectAllByProductId($id)
    { //used in reviews.php
        $sql = "SELECT * FROM reviews join`products` on reviews.product_id=products.product_id  group by products.product_id";
        //echo $sql;
        $result = $this->database->Query($sql);
        $result = $this->database->result;
        return $result;
    }

}

?>
 