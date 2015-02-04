
/*
//開始時に呼ばれる関数
jQuery(document).ready(function(){
	//新規ユーザへの固有のIDを振る
	document.write(userName);
//	CreateNewUserDatabase();
	document.write(userName);
});
*/



//データベースに
function CreateNewUserDatabase(userName,password){
	var flag = 0;
	var param = {"userName" : userName,"password" : password};
	$.ajax({
  	   type: "POST",url: "CreateUser.php",data:JSON.stringify(param),dataType: "json",success: function(data, dataType){
                //結果が0件の場合
                if(data == null) alert('データが0件でした');
                //返ってきたデータ
		flag = data[0].flag;

		if(flag == 0){
			var info = document.getElementById('success');
			var textNode = document.createTextNode('Success!!');
			info.appendChild(textNode);
		}else{
			var info = document.getElementById('success');
			var textNode = document.createTextNode('Miss!');
			info.appendChild(textNode);
		}
           },
 
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                //エラーメッセージの表示
                alert('Error : ' + errorThrown);
            }
        });
}