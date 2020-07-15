// MixitUp
try
{

sal();

var mixer = mixitup('#Container');


}
catch{}

// Tooltip using bootstrap 4
$('[data-toggle="tooltip"]').tooltip();


// to handle edit form in post page

const formEditDiv = document.querySelector('.formEdit');
const editPostBtn = document.querySelectorAll('.toEdit');

function getEdit1(id,title,text)
{
    document.getElementById('editText').value = text;
    document.getElementById('editTitle').value = title;
    document.getElementById('editId').value = id;
}

for(let i = 0; i < editPostBtn.length; i++){
        editPostBtn[i].addEventListener('click',function(e){

            if(formEditDiv.classList.contains('toggleOpacity'))
            {
                e.preventDefault();
                e.stopPropagation();
            }

            setTimeout(function(){
                formEditDiv.classList.add('toggleOpacity');
                window.scrollTo(0, document.body.scrollHeight);
            },500);

        });
    }

    // to handle edit form in worker page

    const editWorkerForm = document.querySelector('.editWorkerForm');
    const editWorkerBtn = document.querySelectorAll('.toEditW');

    function getEdit(id,name,email)
{
    document.getElementById('editEmail').value = email;
    document.getElementById('editName').value = name;
    document.getElementById('editId').value = id;
}

for(let i = 0; i < editWorkerBtn.length; i++){
    editWorkerBtn[i].addEventListener('click',function(e){

        if(editWorkerForm.classList.contains('toggleOpacity'))
        {
            e.preventDefault();
            e.stopPropagation();
        }

        setTimeout(function(){
            editWorkerForm.classList.add('toggleOpacity');
            window.scrollTo(0, document.body.scrollHeight);
        },500);

    });
}



const navBar = document.querySelector('.burger');
const navBarUl = document.querySelector('.nav__list');

navBar.addEventListener('click',function(){

    navBar.classList.toggle('burger--active');
    navBarUl.classList.toggle('nav__list--active');
});

// change color by click on mixbar shop section

const btnsShop = document.querySelectorAll('.mixBar div button');
var btnsShopArray = Array.prototype.slice.call(btnsShop);

for(let i=0; i < btnsShop.length; i++)
btnsShop[i].addEventListener('click',function(e){

    var clickedBtn = btnsShopArray.indexOf(this);
    this.style.color = "var(--red)";

    
        if(clickedBtn >= 0 && clickedBtn <= 3)
        {
            for(let i = 0; i < 4; i++)
            {
                if(i != clickedBtn)
                    btnsShop[i].style.color = "var(--white)";
            }

        }
        else
        {
            for(let i = 4; i < 6; i++)
            {
                if(i != clickedBtn)
                    btnsShop[i].style.color = "var(--white)";
            }
        }

});

// move to shop page by click on 'more'

    if(location.search == "?old")
         btnsShopArray[2].click();

    else if(location.search == "?new")
         btnsShopArray[1].click();

    else if(location.search == "?random")
         btnsShopArray[0].click();

// to confirm delete proccess

const delModal = document.querySelector('.delPost a');
const delModal1 = document.querySelector('.delWorker a');

function toDeletePost(id)
{
    delModal.href = "deletePost.php?dPost="+id;
}

function toDeleteWorker(id)
{        
    delModal1.href="deleteWorker.php?dWorker="+id;
}

// to confirm delete cart process

const deleteCart = document.querySelector('.deleteCartModel a');

function confirmDeleteCart(pid)
{
    deleteCart.href="deleteFromCart.php?postId="+pid;
}

// to confirm buy process

const buyModal = document.querySelector('input[name="total"]');

function confirmBuy(total)
{
    buyModal.value = total;
}

// check input form validity

(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  // change pToggle and content in register page

  const pToggle = document.querySelector('.pToggle');
  const newAccount = document.querySelector('.newAccount span');
  const hasAccount = document.querySelector('.hasAccount span');
  const login = document.querySelector('#login');
  const register = document.querySelector('#register');

  pToggle.addEventListener('click',function(){

    if(pToggle.textContent == "لإنشاء حساب")
    {
        login.style.cssText = "opacity: 0; visibility: hidden;";
        register.style.cssText = "opacity: 1; visibility: visible;";
        pToggle.textContent = "لتسجيل الدخول";
    }
    else
    {
        login.style.cssText = "opacity: 1; visibility: visible;";
        register.style.cssText = "opacity: 0; visibility: hidden;";
        pToggle.textContent = "لإنشاء حساب";
    }
 });

 newAccount.addEventListener('click',function(){

    login.style.cssText = "opacity: 0; visibility: hidden;";
    register.style.cssText = "opacity: 1; visibility: visible;";
    pToggle.textContent = "لتسجيل الدخول";
 });

 hasAccount.addEventListener('click',function(){

    login.style.cssText = "opacity: 1; visibility: visible;";
    register.style.cssText = "opacity: 0; visibility: hidden;";
    pToggle.textContent = "لإنشاء حساب";
 });

 // remove paste in confirmation email and password

 const conEmail = document.querySelector('input[name="email2"');
 const conPassword = document.querySelector('input[name="password2"');

conEmail.addEventListener('paste',function(e){

    e.preventDefault();
});

conPassword.addEventListener('paste',function(e){

    e.preventDefault();
});

// to confirm read order proccess

function confirmeReadOrder()
{   
         $('.hideIconOrder').hide();
        location.href="changeStatusOrder.php?readOrder"; 
}

// to confirm read comment proccess

function confirmeReadComment()
{
       $('.hideIconComment').hide();
       location.href="changeStatusComment.php?readComment";
}

// to confirm read comment user proccess

function confirmeReadCommentUser()
{
       $('.hideIconCommentUser').hide();
       location.href="changeStatusCommentUser.php?readComment";
}