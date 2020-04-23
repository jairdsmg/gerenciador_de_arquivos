
function pesquisar(){
       var n =document.getElementById('num_proc')
       var n_proc =document.getElementById('num_proc_cad')
       var dv_dados =document.getElementById('dados')

       if(n.value=='') {
        alert('Insira o número do processo a ser pesquisado.')
     /*  }else{ 
        
          var resp = confirm('Não há registro(s) de objeto(s) cadastrado(s) ou retirado(s) para este processo.\n Deseja cadastrar agora?')
             if(resp ==true){
                dv_dados.style.visibility='visible'
                n_proc.value=n.value
         }else{
               n.value=''
               dv_dados.style.visibility='hidden'
       }*/
     }
   }

    /* exemplo copiando do input para o clipboard
    let input = document.createElement('input')
    input.value = this.displayCalc;
    document.body.appendChild(input)
     document.execCommand('Copy')*/

   function mascara(t, mask){
      var i = t.value.length;
      var saida = mask.substring(1,0);
      var texto = mask.substring(i)
      if (texto.substring(0,1) != saida){
      t.value += texto.substring(0,1);
          }
       }

      