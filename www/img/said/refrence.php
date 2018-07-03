<?php include 'inc/header.php'; ?>
<?php
$_SESSION['Ulib'];
?>


<?php
$sqlgetref = "SELECT * FROM `refrence`";
$getref     = $conn->query($sqlgetref);
if(isset($_GET['DU'])){
    $Did = $_GET['DU'];
    $sqlDelete = "DELETE FROM `refrence` WHERE `Book_No` = $Did";
    $conn->query($sqlDelete);
    header("location: refrence.php");
}
?>

<link rel="stylesheet" href="css.css" />
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="checked_out.php">الكتب المعارة</a></p>
      <p><a href="do_not_lend.php">الكتب التي لا تعار</a></p>
      <p><a href="refrence.php">المراجع</a></p>
      <p><a href="libraries.php">المكتبات</a></p>
    </div>
    
    
    <div class="col-sm-8 text-left"> 
      <!--<h1 align="center">** مرحباً بك في نظام أرشفة الكتب الالكتروني ** </h1>
      <p align="center"><font size="5">.يهدف هذا النظام لأرشفة جميع الكتب الموجودة في مكاتب جامعة سبها بحيث يسهل الرجوع إليها في أي وقت كان </font></p>
      <hr>-->
     
      <!--<h3>Test</h3>
      <p>Lorem ipsum...</p>-->
      <div class="add" align="center"><h3><a href="?action=add">إضافة كتاب مرجع + </a></h3></div>
       <?php
error_reporting(0);
if($_REQUEST['action']=="delete")
{
$get_id=$_GET['Book_No'];
if($get_id){	
$delete=mysql_query("delete from refrence where Book_No=".$get_id);
if($delete)
{
echo"<div class='ok_send'>تمت عملية الحذف بنجاح</div>";
echo'<meta http-equiv="refresh" content="1; url=refrence.php"/>';
exit;		
}
}
}

if($_POST['edit_refrence'])
{
    $class_No=$_POST['class_No'];
	$ISBN_No=$_POST['ISBN_No'];
    $Book_No=$_POST['Book_No'];
    $Title=$_POST['Title'];
    $sub_Tilte=$_POST['sub_Tilte'];
    $Added_Entry=$_POST['Added_Entry'];	
    $Author=$_POST['Author'];
    $stmt_of_Res=$_POST['stmt_of_Res'];
    $Edition=$_POST['Edition'];
    $Name_of_pub=$_POST['Name_of_pub'];
    $place_of_pub=$_POST['place_of_pub'];
    $Year_of_pub=$_POST['Year_of_pub'];
    $Phy_Des=$_POST['Phy_Des'];
    $Series_stm=$_POST['Series_stm'];
    $Volum_of=$_POST['Volum_of'];
    $General_Note=$_POST['General_Note'];
    $Subject=$_POST['Subject'];
    $URL=$_POST['URL'];
    $Per_library=$_POST['Per_library'];
    $Current_lib=$_POST['Current_lib'];
    $location=$_POST['location'];
    $Call_No=$_POST['Call_No'];
    $Accession_No=$_POST['Accession_No'];
    $Item_Type=$_POST['Item_Type'];
    $Number_of_books=$_POST['Number_of_books'];
    //$Slib_id=$_SESSION['lib_id'];

if($Book_No != '' || $class_No != '' || $ISBN_No != '' || $Title != '' )
{
$sqlUPDATEBOOK="update refrence set `Book_No`='$Book_No' ,`class_No`='$class_No', `ISBN_No`='$ISBN_No' , `Title`='$Title', `sub_Tilte`='$sub_Tilte', `Added_Entry`='$Added_Entry', `Author`='$Author', `stmt_of_Res`='$stmt_of_Res', `Edition`='$Edition', `Name_of_pub`='$Name_of_pub', `place_of_pub`='$place_of_pub', `Year_of_pub`='$Year_of_pub', `Phy_Des`='$Phy_Des', `Series_stm`='$Series_stm', `Volum_of`='$Volum_of', `General_Note`='$General_Note', `Subject`='$Subject', `URL`='$URL', `Per_library`='$Per_library', `Current_lib`='$Current_lib', `location`='$location', `Call_No`='$Call_No', `Accession_No`='$Accession_No', `Item_Type`='$Item_Type', `Number_of_books`='$Number_of_books' where Book_No=".$Book_No;
if ($conn->query($sqlUPDATEBOOK) === TRUE) {


echo"<div class='ok_send'>تمت عملية الحفظ بنجاح</div>";
echo'<meta http-equiv="refresh" content="1; url=refrence.php"/>';
exit;

}

}
if($_REQUEST['action']=='edit')
{
$get_id=$_GET['Book_No'];
if($get_id)
{
$query_edit="select * from refrence where Book_No=".$get_id;	
$row_edit=mysqli_fetch_array($query_edit);

echo'<form method="post" action="" dir="rtl">
<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات الأساسية</font></b></p>
	</legend>

<table align="center" width="55">
<tr>
<td>عنوان الكتاب</td>
<td><input type="text" name="Title" value="'.$row_edit['Title'].'"></td>
<td>العنوان الفرعي</td>
<td><input type="text" name="sub_Tilte" value="'.$row_edit['sub_Tilte'].'"></td>
<td>الطبعة</td>
<td><input type="text" name="Edition" value="'.$row_edit['Edition'].'"></td>
</tr>

<tr>
<td>اسم المؤلف</td>
<td><input type="text" name="Author" value="'.$row_edit['Author'].'"></td>
<td>المؤلفين الأخرين</td>
<td><input type="text" name="Added_Entry" value="'.$row_edit['Added_Entry'].'"></td>
<td>حالة المسؤولية</td>
<td><input type="text" name="stmt_of_Res" value="'.$row_edit['stmt_of_Res'].'"></td>
</tr>

<tr>
<td>دار النشر</td>
<td><input type="text" name="Name_of_pub" value="'.$row_edit['Name_of_pub'].'"></td>
<td>بلد النشر</td>
<td><input type="text" name="place_of_pub" value="'.$row_edit['place_of_pub'].'"></td>
<td>سنة النشر</td>
<td><input type="text" name="Year_of_pub" value="'.$row_edit['Year_of_pub'].'"></td>
</tr>

<tr>
<td>موضوع الكتاب</td>
<td><input type="text" name="Subject" value="'.$row_edit['Subject'].'"></td>
</tr>
</table>
</fieldset><p>&nbsp;</p>



<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات التعريفية</font></b></p>
	</legend>

<table align="center" width="55">

<tr>
<td>رقم تسجيل الكتاب</td>
<td><input type="text" name="Book_No" value="'.$row_edit['Book_No'].'"></td>
<td>رقم ISBN</td>
<td><input type="text" name="ISBN_No" value="'.$row_edit['ISBN_No'].'"></td>
<td>رقم التصنيف</td>
<td><input type="text" name="class_No" value="'.$row_edit['class_No'].'"></td>
</tr>


<tr>
<td>رقم الكتاب</td>
<td><input type="text" name="Call_No" value="'.$row_edit['Call_No'].'"></td>
<td>الباركود</td>
<td><input type="text" name="Accession_No" value="'.$row_edit['Accession_No'].'"></td>
<td>رقم السلسلة</td>
<td><input type="text" name="Volum_of" value="'.$row_edit['Volum_of'].'"></td>
</tr>

<tr>
<td>عدد الصفحات</td>
<td><input type="text" name="Phy_Des" value="'.$row_edit['Phy_Des'].'"></td>
<td>Series stm</td>
<td><input type="text" name="Series_stm" value="'.$row_edit['Series_stm'].'"></td>
<td>موقع URL</td>
<td><input type="text" name="URL" value="'.$row_edit['URL'].'"></td>
</tr>

<tr>
<td>نوع الصنف</td>
<td><input type="text" name="Item_Type" value="'.$row_edit['Item_Type'].'"></td>
</tr>
</table>
</fieldset><p>&nbsp;</p>


<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات المكانية</font></b></p>
	</legend>

<table align="center" width="55">


<tr>
<td>المكتبة الدائمة</td>
<td>
<select name="Per_library">
<option value="MPL">المكتبة المركزية</option>
<option value="Feconomic">كلية الاقتصاد مرزق</option>
<option value="Fnurs">كلية التمريض</option>
<option value="FARTS">كلية الآداب سبها</option>
<option value="FEDUB">كلية التربية براك</option>
<option value="FEDUT">كلية التربية تراغن</option>
<option value="FEDUG">كلية التربية غات</option>
<option value="Fmedtec">كلية التقنية الطبية مرزق</option>
<option value="FAGR">كلية الزراعة سبهاة</option>
<option value="FENGD">كلية الصيدلة سبها</option>
<option value="FENERGY">كلية الطاقة والتعدين</option>
<option value="FMED">كلية الطب سبها</option>
<option value="SPL">كلية العلوم</option>
<option value="FLAWB">كلية القانون براك</option>
<option value="FENG">كلية الهندسة</option>
<option value="FEDUUB">كلية التربية أوباري</option>
<option value="FIT">كلية تقنية المعلومات</option>
<option value="FMEED">كلية طب الأسنان سبها</option>
</select>
</td>
<td>المكتبة الحالية</td>
<td>
<select name="Current_lib">
<option value="MPL">المكتبة المركزية</option>
<option value="Feconomic">كلية الاقتصاد مرزق</option>
<option value="Fnurs">كلية التمريض</option>
<option value="FARTS">كلية الآداب سبها</option>
<option value="FEDUB">كلية التربية براك</option>
<option value="FEDUT">كلية التربية تراغن</option>
<option value="FEDUG">كلية التربية غات</option>
<option value="Fmedtec">كلية التقنية الطبية مرزق</option>
<option value="FAGR">كلية الزراعة سبهاة</option>
<option value="FENGD">كلية الصيدلة سبها</option>
<option value="FENERGY">كلية الطاقة والتعدين</option>
<option value="FMED">كلية الطب سبها</option>
<option value="SPL">كلية العلوم</option>
<option value="FLAWB">كلية القانون براك</option>
<option value="FENG">كلية الهندسة</option>
<option value="FEDUUB">كلية التربية أوباري</option>
<option value="FIT">كلية تقنية المعلومات</option>
<option value="FMEED">كلية طب الأسنان سبها</option>
</select>
</td>
<td>عدد الكتب</td>
<td><input type="text" name="Number_of_books" value="'.$row_edit['Number_of_books'].'"></td>
</tr>


<tr>
<td>موقع الكتاب في الرف</td>
<td><input type="text" name="location" value="'.$row_edit['location'].'"></td>

<td>ملاحظات عامة</td>
<td colspan="3">
<div class="tolbar">
<textarea name="General_Note"id="fdddd">
'.$row_edit['General_Note'].'
</textarea>
<script type="text/javascript" src="editor-min.js"></script>
<script type="text/javascript">

Editor.setStyle({
	"bgColor": "#FFD5B3",
	"borderColor": "#c8c8c8",
	"fontFamily": "tahoma"
});

Editor.run({
	"replace": "fdddd",
	"height": 65,
	"width": 490,
	"path": "",
	"mode": "advance"
});

</script>
</div>
</td>
</tr>

<tr>
<td><input type="submit" name="edit_refrence" value="حفظ التعديل">
<input type="hidden" name="Book_No" value="'.$row_edit['Book_No'].'">
</td>
</tr>

</table>
</fieldset><p>&nbsp;</p>

</form>
';

}
}



if($_POST['add_refrence'])
{
    $class_No=$_POST['class_No'];
	$ISBN_No=$_POST['ISBN_No'];
    $Book_No=$_POST['Book_No'];
    $Title=$_POST['Title'];
    $sub_Tilte=$_POST['sub_Tilte'];
    $Added_Entry=$_POST['Added_Entry'];	
    $Author=$_POST['Author'];
    $stmt_of_Res=$_POST['stmt_of_Res'];
    $Edition=$_POST['Edition'];
    $Name_of_pub=$_POST['Name_of_pub'];
    $place_of_pub=$_POST['place_of_pub'];
    $Year_of_pub=$_POST['Year_of_pub'];
    $Phy_Des=$_POST['Phy_Des'];
    $Series_stm=$_POST['Series_stm'];
    $Volum_of=$_POST['Volum_of'];
    $General_Note=$_POST['General_Note'];
    $Subject=$_POST['Subject'];
    $URL=$_POST['URL'];
    $Per_library=$_POST['Per_library'];
    $Current_lib=$_POST['Current_lib'];
    $location=$_POST['location'];
    $Call_No=$_POST['Call_No'];
    $Accession_No=$_POST['Accession_No'];
    $Item_Type=$_POST['Item_Type'];
    $Number_of_books=$_POST['Number_of_books'];
    //$Slib_id=$_SESSION['lib_id'];
    $libs=$_SESSION['Ulib'];
//Insert query
$sqlSLECTBOOK = "SELECT Book_No,lib_id from refrence where  Book_No='$Book_No' AND lib_id='$libs'";
$result = $conn->query($sqlSLECTBOOK);

 
if ($result->num_rows > 0) {
// هنا ان المفاتح مستخدم من قبل يوزر
echo"<div class='ok_send'>هذا الكتاب موجود مسبقاً</div>"; 
}

else {
// هنا ان المفتاح غير مستخدم من قبل
//echo"<div class='ok_send'>هذا الرقم غير موجود ويمكنك إدخال باقي البيانات</div>"; 
// وبعدها يمكنك عمل انسرينت للحقل للدات بيس
if($Book_No!='' || $Title!='')
{
$sqlINSERTBOOK="insert into refrence (`class_No`,`ISBN_No`,`Book_No`,`Title`,`sub_Tilte`,`Added_Entry`,`Author`,`stmt_of_Res`,`Edition`,`Name_of_pub`,`place_of_pub`,`Year_of_pub`,`Phy_Des`,`Series_stm`,`Volum_of`,`General_Note`,`Subject`,`URL`,`Per_library`,`Current_lib`,`location`,`Call_No`,`Accession_No`,`Item_Type`,`Number_of_books`,`lib_id`) values ('$class_No','$ISBN_No','$Book_No','$Title','$sub_Tilte','$Added_Entry','$Author','$stmt_of_Res','$Edition','$Name_of_pub','$place_of_pub','$Year_of_pub','$Phy_Des','$Series_stm','$Volum_of','$General_Note','$Subject','$URL','$Per_library','$Current_lib','$location','$Call_No','$Accession_No','$Item_Type','$Number_of_books','$libs')";


if($conn->query($sqlINSERTBOOK) === TRUE){
echo"<div class='ok_send'>تمت عملية الحفظ بنجاح</div>";
echo'<meta http-equiv="refresh" content="1; url=refrence.php"/>';
exit;		
}else{
    echo  $conn->error;
}	
}

}
}

if($_REQUEST['action']=="add")
{
echo'<form method="post" action="" dir="rtl">
<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات الأساسية</font></b></p>
	</legend>

<table align="center" width="55">
<tr>
<td>عنوان الكتاب</td>
<td><input type="text" name="Title" value="'.$row_edit['Title'].'"></td>
<td>العنوان الفرعي</td>
<td><input type="text" name="sub_Tilte" value="'.$row_edit['sub_Tilte'].'"></td>
<td>الطبعة</td>
<td><input type="text" name="Edition" value="'.$row_edit['Edition'].'"></td>
</tr>

<tr>
<td>اسم المؤلف</td>
<td><input type="text" name="Author" value="'.$row_edit['Author'].'"></td>
<td>المؤلفين الأخرين</td>
<td><input type="text" name="Added_Entry" value="'.$row_edit['Added_Entry'].'"></td>
<td>حالة المسؤولية</td>
<td><input type="text" name="stmt_of_Res" value="'.$row_edit['stmt_of_Res'].'"></td>
</tr>

<tr>
<td>دار النشر</td>
<td><input type="text" name="Name_of_pub" value="'.$row_edit['Name_of_pub'].'"></td>
<td>بلد النشر</td>
<td><input type="text" name="place_of_pub" value="'.$row_edit['place_of_pub'].'"></td>
<td>سنة النشر</td>
<td><input type="text" name="Year_of_pub" value="'.$row_edit['Year_of_pub'].'"></td>
</tr>

<tr>
<td>موضوع الكتاب</td>
<td><input type="text" name="Subject" value="'.$row_edit['Subject'].'"></td>
</tr>
</table>
</fieldset><p>&nbsp;</p>



<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات التعريفية</font></b></p>
	</legend>

<table align="center" width="55">

<tr>
<td>رقم تسجيل الكتاب</td>
<td><input type="text" name="Book_No" value="'.$row_edit['Book_No'].'"></td>
<td>رقم ISBN</td>
<td><input type="text" name="ISBN_No" value="'.$row_edit['ISBN_No'].'"></td>
<td>رقم التصنيف</td>
<td><input type="text" name="class_No" value="'.$row_edit['class_No'].'"></td>
</tr>


<tr>
<td>رقم الكتاب</td>
<td><input type="text" name="Call_No" value="'.$row_edit['Call_No'].'"></td>
<td>الباركود</td>
<td><input type="text" name="Accession_No" value="'.$row_edit['Accession_No'].'"></td>
<td>رقم السلسلة</td>
<td><input type="text" name="Volum_of" value="'.$row_edit['Volum_of'].'"></td>
</tr>

<tr>
<td>عدد الصفحات</td>
<td><input type="text" name="Phy_Des" value="'.$row_edit['Phy_Des'].'"></td>
<td>Series stm</td>
<td><input type="text" name="Series_stm" value="'.$row_edit['Series_stm'].'"></td>
<td>موقع URL</td>
<td><input type="text" name="URL" value="'.$row_edit['URL'].'"></td>
</tr>

<tr>
<td>نوع الصنف</td>
<td><input type="text" name="Item_Type" value="'.$row_edit['Item_Type'].'"></td>
</tr>
</table>
</fieldset><p>&nbsp;</p>


<fieldset style="padding: 2" dir="rtl">
	<legend align="center">
	<p dir="rtl"><b><font size="5">البيانات المكانية</font></b></p>
	</legend>

<table align="center" width="55">


<tr>
<td>المكتبة الدائمة</td>
<td>
<select name="Per_library">
<option value="MPL">المكتبة المركزية</option>
<option value="Feconomic">كلية الاقتصاد مرزق</option>
<option value="Fnurs">كلية التمريض</option>
<option value="FARTS">كلية الآداب سبها</option>
<option value="FEDUB">كلية التربية براك</option>
<option value="FEDUT">كلية التربية تراغن</option>
<option value="FEDUG">كلية التربية غات</option>
<option value="Fmedtec">كلية التقنية الطبية مرزق</option>
<option value="FAGR">كلية الزراعة سبهاة</option>
<option value="FENGD">كلية الصيدلة سبها</option>
<option value="FENERGY">كلية الطاقة والتعدين</option>
<option value="FMED">كلية الطب سبها</option>
<option value="SPL">كلية العلوم</option>
<option value="FLAWB">كلية القانون براك</option>
<option value="FENG">كلية الهندسة</option>
<option value="FEDUUB">كلية التربية أوباري</option>
<option value="FIT">كلية تقنية المعلومات</option>
<option value="FMEED">كلية طب الأسنان سبها</option>
</select>
</td>
<td>المكتبة الحالية</td>
<td>
<select name="Current_lib">
<option value="MPL">المكتبة المركزية</option>
<option value="Feconomic">كلية الاقتصاد مرزق</option>
<option value="Fnurs">كلية التمريض</option>
<option value="FARTS">كلية الآداب سبها</option>
<option value="FEDUB">كلية التربية براك</option>
<option value="FEDUT">كلية التربية تراغن</option>
<option value="FEDUG">كلية التربية غات</option>
<option value="Fmedtec">كلية التقنية الطبية مرزق</option>
<option value="FAGR">كلية الزراعة سبهاة</option>
<option value="FENGD">كلية الصيدلة سبها</option>
<option value="FENERGY">كلية الطاقة والتعدين</option>
<option value="FMED">كلية الطب سبها</option>
<option value="SPL">كلية العلوم</option>
<option value="FLAWB">كلية القانون براك</option>
<option value="FENG">كلية الهندسة</option>
<option value="FEDUUB">كلية التربية أوباري</option>
<option value="FIT">كلية تقنية المعلومات</option>
<option value="FMEED">كلية طب الأسنان سبها</option>
</select>
</td>
<td>عدد الكتب</td>
<td><input type="text" name="Number_of_books" value="'.$row_edit['Number_of_books'].'"></td>
</tr>


<tr>
<td>موقع الكتاب في الرف</td>
<td><input type="text" name="location" value="'.$row_edit['location'].'"></td>

<td>ملاحظات عامة</td>
<td colspan="3">
<div class="tolbar">
<textarea name="General_Note"id="fdddd">
'.$row_edit['General_Note'].'
</textarea>
<script type="text/javascript" src="editor-min.js"></script>
<script type="text/javascript">

Editor.setStyle({
	"bgColor": "#FFD5B3",
	"borderColor": "#c8c8c8",
	"fontFamily": "tahoma"
});

Editor.run({
	"replace": "fdddd",
	"height": 65,
	"width": 490,
	"path": "",
	"mode": "advance"
});

</script>
</div>
</td>
</tr>

<tr>
<td><input type="submit" name="add_refrence" value="حفظ البيانات"></td>
</tr>

</table>
</fieldset><p>&nbsp;</p>

</form>
';	
}

?>

    </div>
    
    
    
    <div class="col-sm-2 sidenav">
    
    <img src="lib.jpg" width="100%" height="420px" />
      <!--<div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>-->
    </div>
    
  </div>
</div>

<div class="table-responsive">
                        <table class="table user-list" dir="rtl">
                            <thead>
                                <tr>
                                <th class="text-center"><span>رقم الكتاب</span></th>
                                <th class="text-center"><span>عنوان الكتاب</span></th>
                                <!--<th class="text-center"><span>Status</span></th>-->
                                <th class="text-center"><span>المؤلف</span></th>
                                <th class="text-center"><span>سنة النشر</span></th>
                                <th class="text-center"><span>الحذف</span></th>
                               <th class="text-center"><span>التعديل</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $row = $getref->fetch_assoc() ?>
                                <tr>
                                    <td class="text-center"><?= $row['Book_No'] ?></td>
                                    <td class="text-center"><?= $row['Title'] ?></td>
                                    <td class="text-center"><?= $row['Author'] ?></td>
                                    <td class="text-center"><?= $row['Year_of_pub'] ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?= $row['Book_No'] ?>">حذف كتاب</button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info" data-toggle="modal2" data-target="#myModal<?= $row['Book_No'] ?>">تعديل كتاب</button>
                                    </td>
                                </tr>
                                 <!-- Modal -->
  <div class="modal fade" id="myModal<?= $row['Book_No'] ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">"<?= $row['Title']  ?>" حذف</h4>
        </div>
        <div class="modal-body">
          <p dir="rtl">هل تريد حقاً حذف هذا الكتاب؟</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">خروج</button>
          <a href="?DU=<?= $row['Book_No'] ?>" class="btn btn-primary" >حذف كتاب</a>
        </div>
      </div>
      
    </div>
  </div>
  

                            </tbody>
                        </table>
                    </div>












<!--جدول عرض الكتب--> 
<!--<table width="80%" align="center" dir="rtl" border="1">
<tr>
<th>رقم الكتاب</th>
<th>عنوان الكتاب</th>
<th>المؤلف</th>
<th>سنة النشر</th>
<th>دار النشر</th>
<th>التعديل</th>
<th>الحذف</th>
</tr>-->
<?php
//$Slib_id = $_SESSION['lib_id'];
//$libs = $_SESSION['Ulib'];
//$query=mysql_query("select * from refrence where lib_id= $libs ");
/*while($row=mysql_fetch_array($query))
{
	echo
	'
<tr>
<td>'.$row['Book_No'].'</td>
<td>'.$row['Title'].'</td>
<td>'.$row['Author'].'</td>
<td>'.$row['Year_of_pub'].'</td>
<td>'.$row['Name_of_pub'].'</td>
<td><a href="?action=edit&Book_No='.$row['Book_No'].'">تعديل</a></td>
<td><a href="?action=delete&Book_No='.$row['Book_No'].'">حذف</a></td>
</tr>
	';
}

?>
</table>*/
?>
<?php include 'inc/footer.php'; ?>
