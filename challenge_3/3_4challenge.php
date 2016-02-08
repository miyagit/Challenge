<?php
function view_profile(){
	
	echo "私の名前は宮嶋です"."<BR>";
	echo "22歳です"."<BR>";
	echo "大阪出身です"."<BR>";
	return true;
	
	
}
$hantei = view_profile();
if($hantei == true) {
	print "「この処理は正しく実行できました」";

}else {
	print "「正しく実行できませんでした」";
}
print $hantei;
?>