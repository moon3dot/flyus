<?php
ob_start();
header("content-type: text/html; charset=utf-8");

include 'nusoap.php';
include 'SBPayment.class.php';


$conn = mysqli_connect('localhost','username','passowrd','database');

$sb = new SBPayment("merchantID","password",$conn);

if( isset($_POST['State']) ){
    $State  = $_POST['State'];
    $RefNum = $_POST['RefNum'];
    $ResNum = $_POST['ResNum'];
    
    $sb->receiverParams($ResNum,$RefNum,$State);
    $sb->getMsg('display');

} elseif( isset( $_POST['submit'] ) ) {

    if( $sb->saveStoreInfo( $_POST['totalAmont'] ) ) {
        $sb->sendParams();
    } else {
        $sb->getMsg('display');
    }
} else { ?>

    <form action="<?php print $_SERVER['SCRIPT_NAME']; ?>" method="post" />
    مبلغ سفارش<input type="text" name="totalAmont" />
    <input type="submit" name="submit" value="payment" />
    </form>
<?php } ?>