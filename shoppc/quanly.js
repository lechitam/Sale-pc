//*******************************************************************************
function isEmpty(ten)
{
	if (ten=="")
		return false;
	return true;
}
//*******************************************************************************
function isEmail(string) {
	if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
		return true;
	else
		return false;
}

//*******************************************************************************

function checklengthpass(pass)
{
	p=document.formthanhvien.pass.value;
	if(p.length<6)
		return false;
	else
		return true;
}

//*******************************************************************************
function checklengthpass2(pass)
{
	p=document.changepw.pass.value;
	if(p.length<6)
		return false;
	else
		return true;
}

//*******************************************************************************
function checkquyen(quyen)
{
	if(quyen==""||quyen=="chonquyen")
		return false;
	return true;
}

//*******************************************************************************
function checkuser(user)
{
	if(user=="administrator"||user=="admin"||user=="quantrivien")
		return false;
	return true;
}

//*******************************************************************************
function checkloaisp(loaisp)
{
	if(loaisp=="chonlsp")
		return false;
	return true;
}

//*******************************************************************************
function checkmenu(menu)
{
	if(menu=="chonmenu")
		return false;
	return true;
}


//*******************************************************************************

//**********************************************************************************
function lienhe(hoten,email,noidung)
{
	if(isEmpty(hoten)==false)
	{
		alert("Quý khách chưa nhập họ tên");
		return false;
	}
	if(isEmail(email)==false)
	{
		alert("Email không hợp lệ!");
		return false;
		
	}	
	if(isEmpty(noidung)==false)
	{
		alert("Quý khách chưa nhập nội dung");
		return false;
	}	
}

//**********************************************************************************
function gopy(tieude,hoten,email,noidung)
{
	if(isEmpty(tieude)==false)
	{
		alert("Quý khách chưa nhập tiêu đề");
		return false;
	}	
	if(isEmpty(hoten)==false)
	{
		alert("Quý khách chưa nhập họ tên");
		return false;
	}
	if(isEmail(email)==false)
	{
		alert("Email không hợp lệ!");
		return false;
		
	}	
	if(isEmpty(noidung)==false)
	{
		alert("Quý khách chưa nhập nội dung");
		return false;
	}	
		
}

//**********************************************************************************
function thanhvien_insert(user,pass,apass,hoten,email,diachi,dienthoai)
{
	if (isEmpty(user)==false)
    {
		alert("Tên đăng nhập không được rỗng!");
		return false;
	}
	
	if(checkuser(user)==false)
	{
		alert("Quý khách không thể đăng ký tên đăng nhập này!");
		return false;	
	}
	
	if(checklengthuser(user)==false)
	{
		alert("Chiều dài của tên đăng nhập phải lớn hơn 6 ký tự!");
		return false;		
	}
	
	if(isNaN(user)==false)
	{
		alert("Tên đăng nhập phải là chữ! không được là số!");
		return false;
	}
	
	if (isEmpty(pass)==false)
   	 {
  	   alert("Mật khẩu không được rỗng!");	
		 return false;
		}
	else 
		if (isEmpty(apass)==false)
    	{
	  	   alert("Mật khẩu không được rỗng!");	
			 return false;
		}
		else
			if (pass!=apass)
    		{
	  		   alert("Mật khẩu không giống nhau! Nhập lại!");	
				 return false;
			}
	
	if(checklengthpass(pass)==false)
	{
		alert("Chiều dài mật khẩu phải lớn hơn 6!");
		return false;
	}
	
	if (isEmpty(hoten)==false)
    {
		alert("Họ tên không được rỗng!");
		return false;
	}	
	
	if (isEmail(email)==false)
    {
		alert("Email không hợp lệ!");
		return false;
	}

	if (isEmpty(diachi)==false)
    {
		alert("Địa chỉ không được rỗng!");
		return false;
	}
	
	if (isEmpty(dienthoai)==false)
    {
		alert("Điện thoại không được rỗng!");
		return false;
	}	

return true;
}

//**********************************************************************************
function thanhvien_change(hoten,email,diachi,anti)
{	
	if (isEmpty(hoten)==false)
    {
		alert("Họ tên không được rỗng!");
		return false;
	}	
	
	if (isEmail(email)==false)
    {
		alert("Email không hợp lệ!");
		return false;
	}

	if (isEmpty(diachi)==false)
    {
		alert("Địa chỉ không được rỗng!");
		return false;
	}		
	
	if (isEmpty(anti)==false)
    {
		alert("Mã an toàn không được rỗng!");
		return false;
	}
return true;
}


function thanhtoan(hoten,diachi,email,dt)
{
	if (isEmpty(hoten)==false)
    {
		alert("Quý khách phải nhập Họ tên");
		return false;
	}
	
	if (isEmpty(diachi)==false)
    {
		alert("Quý khách phải nhập địa chỉ !");
		return false;
	}
	
	if (isEmail(email)==false)
   	 {
  	   alert("Email không hợp lệ");	
		 return false;
	}
	
	if(isEmpty(dt)==false)
	{
		alert("Quý khách chưa nhập điện thoại!");
		return false;
	}
	
return true;
}




//*******************************************************************************
function checklh()
{
	var thongbao=window.confirm("Bạn chắc chắn muốn xóa liên hệ này?");
  if (thongbao==true)
  		return true;
  else 
		return false;
}

//*******************************************************************************
function checktv()
{
	var thongbao=window.confirm("Bạn chắc chắn muốn xóa thành viên này?");
  if (thongbao==true)
  		return true;
  else 
		return false;
}
//*******************************************************************************
function tk(text_content)
{
	if (isEmpty(text_content)==false)
    {
		alert("Chưa nhập từ khóa cần tìm!");
		return false;
	}	
return true;
}

//*******************************************************************************
function admin_changepw(pw_old,pw,cpw)
{
	if (isEmpty(pw_old)==false)
    {
		alert("Mật khẩu cũ không được rỗng");
		return false;
	}
	
	if (isEmpty(pw)==false)
   	 {
  	   alert("Mật khẩu mới không được rỗng");	
		 return false;
		}
	else 
	{
		if (isEmpty(cpw)==false)
    	{
	  	   alert("Viết lại Mật khẩu không được rỗng");	
			 return false;
		}
		else
		{
			if (pw!=cpw)
    		{
	  		   alert("Viết lại Mật khẩu bị sai");	
				 return false;
			}
		}
	}	
return true;
}

//*******************************************************************************
function tintuc_insert(noidung,ghichu)
{
	if(isEmpty(noidung)==false)
	{
		alert("Chưa nhập nội dung!");	
		return false;
	}
	
	if (checkmenu(ghichu)==false)
    {
		alert("Chưa chọn trạng thái!");
		return false;
	}
			
return true;
}



//*******************************************************************************
function nhomsp_insert(ten)
{
	if (isEmpty(ten)==false)
    {
		alert("Chưa nhập tên nhóm!");
		return false;
	}	
return true;
}

//*******************************************************************************
function loaisp_insert(nhomsp,ten)
{
	if (checkmenu(nhomsp)==false)
    {
		alert("Chưa chọn nhóm sản phẩm!");
		return false;
	}
	if (isEmpty(ten)==false)
    {
		alert("Chưa nhập tên loại!");
		return false;
	}	
return true;
}