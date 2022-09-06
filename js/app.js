

 

  var mycls = document.getElementsByClassName('nav-link');
  for(let i=0; i<=mycls.length; i++){
     mycls[i].addEventListener("click",function(){ 
      for (var j = 0; j < mycls.length; j++) {
        mycls[j].classList.remove('active');
      }
      this.classList.add('active');

      // in mobile menu it works on collaps the navigation on click a menu item
       document.getElementById("navbarNavDropdown").classList.remove("show");
       //----------------------------------------------------------------------
      
    });
  }


  // header menu fixed script 

  function scroller(){

    let  p = window.pageYOffset;
     
    if(p>200){
      let k = document.getElementById('header');
      k.classList.add('active') 
    }else{
      let k = document.getElementById('header');
      k.classList.remove('active') 
    }
     
  }
     
   