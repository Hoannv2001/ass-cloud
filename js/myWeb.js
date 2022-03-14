document.getElementById("showcart").style.display="none";
document.getElementById("showUpdate").style.display="none";

var cart = new Array();
function addCart(x){

    toast({
        title: "Successfully!",
        message: "You have added a product to the cart!.",
        type: "success",
        duration: 5000
        });
        
    var cart_info = x.parentElement.children;
    var img = cart_info[0].children[0].src;
    var tpye = cart_info[1].innerText;
    var demo = cart_info[2].innerText;
    var price = cart_info[3].children[0].innerText;
    var number = parseInt(cart_info[4].value);
    var product = new Array(img, tpye, demo, price, number);
// update
    var check = 0;
    for (let i = 0; i < cart.length; i++) {
        if (cart[i][1] == tpye) {
            check = 1;
            number += parseInt(cart[i][4]);
            cart[i][4] = number;
            break;
        }
    }

    if (check == 0) {
        cart.push(product);
    }

    console.log(cart);
    showCountProduct();

}
// add
function showCountProduct() {
    document.getElementById("count").innerHTML = cart.length;
}
// remove
function showmycart(){
    var infoCart = "";
    var sum = 0;
    var quality = 0;

    for (let i = 0; i < cart.length; i++) {
        var sumMoney = parseInt(cart[i][3])*parseInt(cart[i][4]);
        var sumQuality = parseInt(cart[i][4]);
        quality += sumQuality;
        sum +=sumMoney;

        infoCart +='<tr>'+
        '<td>'+(i+1)+'</td>'+
        '<td><img src="'+cart[i][0]+'" alt=""></td>'+
        '<td>'+cart[i][1]+'</td>'+
        '<td>'+cart[i][2]+'</td>'+
        '<td>'+cart[i][3]+' $</td>'+
        '<td>'+cart[i][4]+'</td>'+
        '<td>'+
            '<button onclick="removeProduct(this)">Remove</button>'+
        '</td>'+
        '</tr>';
        
    }
    infoCart+='<tr>'+
        '<th colspan="4">Sum OF Money</th>'+
        '<th>'+
            '<div>'+sum+'$</div>'+
        '</th>'+
        '<th>'+
            '<div>'+quality+'</div>'+
        '</th>'+
        '<th>'+
            '<div></div>'+
        '</th>'+
        '</tr>';

        document.getElementById("mycart").innerHTML=infoCart;
}

function removeProduct(x) {
    var producR = x.parentElement.parentElement;
    var Nproduct = producR.children[2].innerText;
    producR.remove();

    for (let i = 0; i < cart.length; i++) {
        if (cart[i][1] == Nproduct) {
            cart.splice(i, 1);
        }
        showmycart();
        showCountProduct()
        
    }
}

function removeAll() {
    cart=[];
    showmycart();
    showCountProduct()
}
// Toast function--click button
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
     
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }
//   nut bam cart
  function showcart(){
    var x = document.getElementById("showcart");

    if (x.style.display == "block") {
        x.style.display = "none";
    }else{
        x.style.display = "block";
        showmycart();
    }
}

function profile() {
    // document.getElementById("showUpdate").style.display= "none";
    var x = document.getElementById("showUpdate");

    if (x.style.display == "block") {
        x.style.display = "none";
    }else{
        x.style.display = "block";
    }
}