// Select the div element


let hasRunone = false;
let hasRun = false;
let hasRuntiga = false;
let hasRunempat = false;
var myDiv = document.getElementById("to-progress");
var imggpt= document.getElementById("imggpt1");
var imgdivgtp = document.querySelector('.img-wrap-gpt');
var txtgtp = document.querySelector('.text-content-gtp');
// Create a new MutationObserver instance
var observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if(mutation.target.textContent=="1/5"){

        if (!hasRunone) {
            if (imggpt.classList.contains('classone')) {

              } else {
                imggpt.className = "classone";
                // imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");
              }
            //   imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");





            setTimeout(function() {
            hasRunone = true;
            hasRun = false;
            hasRuntiga = false;
            hasRunempat = false;
              }, 180);

              document.getElementById("imggpt1").src="/public/aceweb/assets/img/go1.png";
          }


          //imggpt.classList.remove("fadeIn");

    }
    // Log the changed content to the console
    //console.log("Content changed: " + mutation.target.textContent);
    if(mutation.target.textContent=="2/5"){

        if (!hasRun) {
                if (imggpt.classList.contains('classone')) {
                    imggpt.classList.remove("classone");
                    imggpt.classList.add("classtwo");
                    // imgdivgtp.classList.remove("aos-animate");
                    // txtgtp.classList.remove("aos-animate");
                } else {

                }


                // imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");



            setTimeout(function() {
                hasRun = true;
                hasRunone = false;
            hasRuntiga = false;
            hasRunempat = false;
              }, 500);
          }
          //imgdivgtp.classList.remove("aos-animate");
          //txtgtp.classList.remove("aos-animate");
          //imggpt.classList.remove("fadeIn")
          //imggpt.classList.add("fadeIn");
          $("#imggpt1").attr("src", "/public/aceweb/assets/img/go2.png");









        }
    if(mutation.target.textContent=="3/5"){
        if (!hasRuntiga) {


            if (imggpt.classList.contains('classtwo')) {

                // imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");
                imggpt.classList.remove("classtwo");
                imggpt.classList.add("classthree");


            } else {

            }
            // imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");



            setTimeout(function() {
                hasRuntiga = true;
                hasRun=false;
                hasRunone=false;
                hasRunempat = false;
              }, 500);
          }
          $("#imggpt1").attr("src", "/public/aceweb/assets/img/go3.png");
          //imggpt.classList.remove("fadeIn");
    }
    if(mutation.target.textContent=="4/5"){
        if (!hasRunempat) {

            if (imggpt.classList.contains('classthree')) {
                imggpt.classList.remove("classthree");
                imggpt.classList.add("classfour");
                // imgdivgtp.classList.remove("aos-animate");
            //     txtgtp.classList.remove("aos-animate");
            // } else {

            }

                // imgdivgtp.classList.remove("aos-animate");
                // txtgtp.classList.remove("aos-animate");

            setTimeout(function() {
                hasRunempat = true;
                hasRun=false;
                hasRunone=false;
                hasRuntiga=false;
              }, 180);


          }
        //imgdivgtp.classList.remove("aos-animate");
        //txtgtp.classList.remove("aos-animate");
          //$("#imggpt1").addClass("fadeIn");
          $("#imggpt1").attr("src", "/public/aceweb/assets/img/go4.png");
    }
    if(mutation.target.textContent=="5/5"){
           //imggpt.classList.remove("fadeIn");

           $("#imggpt1").attr("src", "/public/aceweb/assets/img/go5.png");
    }
  });
});

// Configure the observer to watch for changes to the div's content
var config = { childList: true, characterData: true, subtree: true };
observer.observe(myDiv, config);


