
function CreatePlayer(){
		var param = {"ID" : myID};
	$.ajax({
  	   type: "POST",url: "SetPlayer.php",data:JSON.stringify(param),dataType: "json",success: function(data, dataType){
                //結果が0件の場合
                if(data == null) alert('データが0件でした');
                //返ってきたデータ
		myID = data[0].id;
            },
            
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                //エラーメッセージの表示
                alert('Error : ' + errorThrown);
            }
        });
}