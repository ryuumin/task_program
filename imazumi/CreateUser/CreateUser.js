
/*
//�J�n���ɌĂ΂��֐�
jQuery(document).ready(function(){
	//�V�K���[�U�ւ̌ŗL��ID��U��
	document.write(userName);
//	CreateNewUserDatabase();
	document.write(userName);
});
*/



//�f�[�^�x�[�X��
function CreateNewUserDatabase(userName,password){
	var flag = 0;
	var param = {"userName" : userName,"password" : password};
	$.ajax({
  	   type: "POST",url: "CreateUser.php",data:JSON.stringify(param),dataType: "json",success: function(data, dataType){
                //���ʂ�0���̏ꍇ
                if(data == null) alert('�f�[�^��0���ł���');
                //�Ԃ��Ă����f�[�^
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
                //�G���[���b�Z�[�W�̕\��
                alert('Error : ' + errorThrown);
            }
        });
}