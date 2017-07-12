function confirmarDrop(){
	var delete = confirm('Deseja deletar esse registro ?');

	if(delete){
		return true;
	}
	else{
		return false;
	}
}