<!-- MODAL 1 -->
<div id="white_content" class="white_content" >
    <div id="sic2" style=""></div>    
</div>
<div id="black_overlay" class="black_overlay"></div>


<!-- MODAL 2 -->
<?php if(isset($ModalResponse) && $ModalResponse!="" ): ?>
    <div id="white_content2" class="white_content2" style="display: block;" >
        <div id="sic2a" style="">
            <button id="closebox2" title="Close">
                <i class="fa fa-close fa-2x"></i>
            </button>
            <?= $ModalResponse; ?>     
        </div>
    </div>
    <div id="black_overlay2" class="black_overlay2" style="display: block;" ></div>

<?php endif; 
if(isset($ModalResponse)) unset($ModalResponse);
?>