                    // Sal.js
try
{
sal();
}
catch{}
                    // MixitUp
try
{
var mixer = mixitup('#Container');
}
catch{}



// Fix sal for Guid

const article = document.querySelectorAll('.article');

window.addEventListener('scroll',articleTransition);
window.addEventListener('load',articleTransition);

function articleTransition()
{
    try
    {
    if(article[0].classList.contains('sal-animate'))
    {
        setTimeout(function(){
            for(let i = 0; i < 3; i++)
            article[i].style.cssText += "transition: all 0.3s ease-in-out !important;";

        },1000);
    }
    if(article[3].classList.contains('sal-animate'))
    {
        setTimeout(function(){
            for(let i = 3; i < 6; i++)
            article[i].style.cssText += "transition: all 0.3s ease-in-out !important;";

        },1000);
    }
    }
    catch{}
}

// Guid article movment

for(let i = 0; i < article.length; i++)
{
    article[i].addEventListener('mouseenter',changeContent);
    article[i].addEventListener('mouseleave',returnContent);
}

    function changeContent()
    {
        this.children[2].children[1].style.opacity = "0";
        this.children[2].children[2].style.opacity = "1";
    }
    function returnContent()
    {
        this.children[2].children[1].style.opacity = "1";
        this.children[2].children[2].style.opacity = "0";
    }

// coverHalf movment

const coverHalf = document.querySelector('.coverHalf');
const coverState = document.querySelector('#coverState');
try
{
coverState.addEventListener('click',function(){

    if(coverState.textContent == 'انشاء حساب')
    {
        coverHalf.style.cssText = "right: 50%;";
        
        setTimeout(function(){
            coverHalf.children[2].innerHTML = "تسجيل الدخول";
            coverHalf.children[1].src = "img/loginIcon.svg";
        },1000);
    }
    else
    {
        coverHalf.style.cssText = "right: 0;";
        
        setTimeout(function(){
            coverHalf.children[2].innerHTML = "انشاء حساب";
            coverHalf.children[1].src = "img/registerIcon.svg";
        },1000);
    }
});
}
catch{}

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
   
// change color by click on mixbar shop section

const btnsShop = document.querySelectorAll('.mixBar div button');
var btnsShopArray = Array.prototype.slice.call(btnsShop);

for(let i=0; i < btnsShop.length; i++)
btnsShop[i].addEventListener('click',function(e){

    var clickedBtn = btnsShopArray.indexOf(this);
    this.style.color = "var(--main-en-color)";

    
        if(clickedBtn >= 0 && clickedBtn <= 3)
        {
            for(let i = 0; i < 4; i++)
            {
                if(i != clickedBtn)
                    btnsShop[i].style.color = "var(--main-ar-color)";
            }

        }
        else
        {
            for(let i = 4; i < 6; i++)
            {
                if(i != clickedBtn)
                    btnsShop[i].style.color = "var(--main-ar-color)";
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

// show add and edit post form

const addPostBtn = document.querySelector('.addPost');
const formAddDiv = document.querySelector('.formAdd');

const formEditDiv = document.querySelector('.formEdit');
const editPostBtn = document.querySelectorAll('.toEdit');

try{
addPostBtn.addEventListener('click',function(e){

    if(addPostBtn.getAttribute('aria-expanded') == "false" || addPostBtn.getAttribute('aria-expanded') == null)
    {
        addPostBtn.innerHTML = "الغاء";
    }
    else
    {
        addPostBtn.innerHTML = "اضافة منتج جديد";
    }
});
}
catch{}

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

// show add and edit worker form

const addWorkerBtn = document.querySelector('.addWorkerBtn');
const addWorkerForm = document.querySelector('.addWorkerForm');
const addCommentBtn = document.querySelector('.addCommentBtn');
const addCommentForm = document.querySelector('.addCommentForm');

const editWorkerForm = document.querySelector('.editWorkerForm');
const editWorkerBtn = document.querySelectorAll('.toEditW');


try{
addWorkerBtn.addEventListener('click',function(e){

    if(addWorkerBtn.getAttribute('aria-expanded') == "false" || addWorkerBtn.getAttribute('aria-expanded') == null)
    {
        addWorkerBtn.innerHTML = "الغاء";
    }
    else
    {
        addWorkerBtn.innerHTML = "إضافة موظف";
    }
});
}
catch{}

try{
    addCommentBtn.addEventListener('click',function(e){
    
        if(addCommentBtn.getAttribute('aria-expanded') == "false" || addCommentBtn.getAttribute('aria-expanded') == null)
        {
            addCommentBtn.innerHTML = "الغاء";
        }
        else
        {
            addCommentBtn.innerHTML = "إضافة تعليق";
        }
    });
    }
    catch{}

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


// to confirm read comment proccess

function confirmeReadComment()
{
       $('.hideIconComment').hide();
       location.href="changeStatusComment.php?readComment";
}

// to confirm read order proccess

function confirmeReadOrder()
{   
         $('.hideIconOrder').hide();
        location.href="changeStatusOrder.php?readOrder"; 
}

// to confirm buy process

const buyModal = document.querySelector('.buyProcess a');

function confirmBuy(total)
{
    buyModal.href="FinalStage.php?total="+total;
}