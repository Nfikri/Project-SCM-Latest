<?php
require_once 'mysql_connection.php';
include './includes/header.php';
?>    
<div class="slideshow-container">
    <div class="slides">
        <div class="number">1/3</div>
        <div class="slides-images"><img src="img/slideshow/store.jpg"/></div>

    </div>
    <div class="slides">
        <div class="number">2/3</div>
        <div class="slides-images"><img src="img/slideshow/bag.jpg"/></div>

    </div>
    <div class="slides">
        <div class="number">3/3</div>
        <div class="slides-images"><img src="img/slideshow/delivery.jpg"/></div>

    </div>
    <a class="prev" onclick="plusIndex(-1)">&#10094;</a>
    <a class="next" onclick="plusIndex(+1)">&#10095;</a>

</div>
<br>

<div style="text-align: center;">
    <span class="dots" onclick="currentSlide(1)"></span>
    <span class="dots" onclick="currentSlide(2)"></span>
    <span class="dots" onclick="currentSlide(3)"></span>

</div>

<div class="ruang-kosong">
    <br>
</div>
<div class="wrapper">

    <div class="nested">

        <div style="background: white;border: 3px solid #8b0434;">
            <div style="width: 50%;">
                <img src="img/cup.png" alt="" style="padding: 15px 0 0 0; float: left"/>
            </div>
            <div style="margin:0 auto; width:50%; float: left;">
                <p style="padding: 26px 0 0 15px;">
                    <b>Best Selling Hardware</b>
                </p>
            </div>

        </div>
        <div>
            <div id="satu" class="square" style="width: 50%; border: 2px solid #8b0434;">
                <img src="img/products/Hedge Shear Cutter.png" alt=""/>
            </div>
            <div id="dua" style="margin: 0 auto; padding: 10px 0 0 15px;">
                <p>
                <h4>#1</h4>
                </p>
                <p>
                    <b>Hedge Shear Cutter</b>
                </p>
            </div>

        </div>
        <div>
            <div id="satu" class="square" style="width: 50%;border: 2px solid #8b0434;">
                <img src="img/products/Claw Hammer.png" alt=""/>
            </div>
            <div id="dua" style="margin: 0 auto; padding: 10px 0 0 15px;">
                <p>
                <h4>#2</h4>
                </p>
                <p>
                    <b>Claw Hammer</b>
                </p>
            </div>

        </div>
        <div>
            <div id="satu" class="square" style="width: 50%;border: 2px solid #8b0434;">
                <img src="img/products/Water Pump Pliers.png" alt=""/>
            </div>
            <div id="dua" style="margin: 0 auto; padding: 10px 0 0 15px;">
                <p>
                <h4>#3</h4>
                </p>
                <p>
                    <b>Water Pump Pliers</b>
                </p>
            </div>

        </div>
        <div>
            <div id="satu" class="square" style="width: 50%;border: 2px solid #8b0434;">
                <img src="img/products/2 Way Tap.png" alt=""/>
            </div>
            <div id="dua" style="margin: 0 auto; padding: 10px 0 0 15px;">
                <p>
                <h4>#4</h4>
                </p>
                <p>
                    <b>2 Way Tap</b>
                </p>
            </div>

        </div>
        <div>
            <div id="satu" class="square" style="width: 50%;border: 2px solid #8b0434;">
                <img src="img/products/Voltage Tester Screwdriver.png" alt=""/>
            </div>
            <div id="dua" style="margin: 0 auto; padding: 10px 0 0 15px;">
                <p>
                <h4>#5</h4>
                </p>
                <p>
                    <b>Voltage Tester Screw</b>
                </p>
            </div>

        </div>
    </div>
    <div>
        <u><h1 style="text-align: center;font-weight: bold">Latest News!</h1></u>
        <div style="width: 600px;margin: 0 auto;">
            <p align="justify"> 
            Oporteat volutpat postulant sed et, qui ea accumsan volutpat iudicabit, ex sea partem iracundia. Ad vituperata mediocritatem duo, omnes nominati eu pri. Elit aliquam in est, ex causae laoreet democritum duo. Te doctus tritani qui, doctus debitis complectitur at usu, deseruisse dissentias in cum. Prompta quaeque nec no, an eum vide ferri, quo ne duis fastidii.

            Meis tibique apeirian et pri. Nostrud detracto et vis. Idque suscipit in qui, wisi zril munere id sit, cu eam quando mucius ceteros. Unum sadipscing ad sed. Ut mea fabellas definiebas.
            </p>
    
        </div>
        
        <u><h1 style="text-align: center;font-weight: bold">We are hiring!</h1></u>
        <div style="width: 600px;margin: 0 auto;">
            <p align="justify"> 
            Oporteat volutpat postulant sed et, qui ea accumsan volutpat iudicabit, ex sea partem iracundia. Ad vituperata mediocritatem duo, omnes nominati eu pri. Elit aliquam in est, ex causae laoreet democritum duo. Te doctus tritani qui, doctus debitis complectitur at usu, deseruisse dissentias in cum. Prompta quaeque nec no, an eum vide ferri, quo ne duis fastidii.

            Meis tibique apeirian et pri. Nostrud detracto et vis. Idque suscipit in qui, wisi zril munere id sit, cu eam quando mucius ceteros. Unum sadipscing ad sed. Ut mea fabellas definiebas.
            </p>
    
        </div>
        
        <u><h1 style="text-align: center;font-weight: bold">Stay Updated with us!</h1></u>
        <div style="width: 600px;margin: 0 auto;">
            <p align="justify"> 
            Oporteat volutpat postulant sed et, qui ea accumsan volutpat iudicabit, ex sea partem iracundia. Ad vituperata mediocritatem duo, omnes nominati eu pri. Elit aliquam in est, ex causae laoreet democritum duo. Te doctus tritani qui, doctus debitis complectitur at usu, deseruisse dissentias in cum. Prompta quaeque nec no, an eum vide ferri, quo ne duis fastidii.

            Meis tibique apeirian et pri. Nostrud detracto et vis. Idque suscipit in qui, wisi zril munere id sit, cu eam quando mucius ceteros. Unum sadipscing ad sed. Ut mea fabellas definiebas.
            </p>
    
        </div>
        </div>


</div>
<script type="text/javascript">
    var slideIndex = 1;


    showImage(slideIndex);

    function plusIndex(n) {
        showImage(slideIndex += n);
    }


    function currentSlide(n) {
        showImage(slideIndex = n);
    }


    function showImage(n) {
        var slide = document.getElementsByClassName("slides");
        if (n > slide.length) {
            slideIndex = 1
        }
        ;
        if (n < 1) {
            slideIndex = slide.length
        }
        ;
        for (var i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }
        ;
        slide[slideIndex - 1].style.display = "block";
        for (var i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        ;
        dots[slideIndex - 1].className += " active";
    }
</script>


<?php
include './includes/footer.php';
?>

