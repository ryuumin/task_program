
function CreatePlayer(){
		var param = {"ID" : myID};
	$.ajax({
  	   type: "POST",url: "SetPlayer.php",data:JSON.stringify(param),dataType: "json",success: function(data, dataType){
                //���ʂ�0���̏ꍇ
                if(data == null) alert('�f�[�^��0���ł���');
                //�Ԃ��Ă����f�[�^
		myID = data[0].id;
            },
            
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                //�G���[���b�Z�[�W�̕\��
                alert('Error : ' + errorThrown);
            }
        });
}