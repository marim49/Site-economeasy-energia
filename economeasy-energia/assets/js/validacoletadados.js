function validacampos()
{
	var horas=document.coletaDados.horaslamp.value;
	if(isNaN(horas)==true)
	{
		alert("Por favor, Insira somente números !");
		return false;
	}
	var horaschuveiro=document.coletaDados.horaschuv.value;
	if(isNaN(horaschuveiro)==true)
	{
		alert("Por favor, Insira somente números !");
		return false;
	}
}
function limparcampos()
{
	document.coletaDados.horaslamp.value="";
	document.coletaDados.horaschuv.value="";
	document.coletaDados.lampadas.value="";
	document.coletaDados.potencialampadas.value="";
	document.coletaDados.quantidadelamp.value="";
	document.coletaDados.chuveiros.value="";
	document.coletaDados.potenciachuveiro.value="";
	document.coletaDados.quantidadechu.value="";
}
function aumentalampadas()
{
	var mostra=document.getElementById("consumolampadas2").style.display;
	if(mostra=="none")
	{
		document.getElementById("consumolampadas2").style.display="block";
	}else
		{
			document.getElementById("consumolampadas2").style.display="none";
		}
}
function imprimivalorconsumo()
{
	var consumo1 = document.getElementById("consumo1").value;
	var consumo2 = document.getElementById("consumo2").value;
	var consumo3 = document.getElementById("consumo3").value;
	document.getElementById('valor1').value=consumo1;
	document.getElementById('valor2').value=consumo2;
	document.getElementById('valor3').value=consumo3;

}