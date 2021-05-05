<div class="wh-api" style=" z-index: 9;">
    <div class="wh-fixed">
        <a href="{{ $configuracoes->whatsapp_link }}" target="_blank" class="whatsapp" data-selector="img">
            <button class="wh-ap-btn"></button>
        </a>
    </div>
</div>
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
    * {
        font-family: 'Roboto', sans-serif;
    }
    button.wh-ap-btn {
        outline: none;
        width:  60px;
        height:  60px;
        border:  0;
        background-color: #2ecc71;
        padding:  0;
        border-radius:  100%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        cursor:  pointer;
        transition:  opacity 0.3s, background 0.3s, box-shadow 0.3s;
    }

    button.wh-ap-btn::after {
        content: '';
        background-image: url('//i.imgur.com/cAS6qqn.png');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 48%;
        width:  100%;
        height:  100%;
        display:  block;
        opacity: 1;
    }

    button.wh-ap-btn:hover {
        opacity:  1;
        background-color: #20bf6b;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }

    .wh-api {
        position:  fixed;
        bottom:  0;
        right:  0;
    }

    .wh-fixed {
        margin-right:  15px;
        margin-bottom:  15px;
    }

    .wh-fixed>a {
        display:  block;
        text-decoration:  none;
    }

    .wh-fixed>a:hover button.wh-ap-btn::before {
        opacity:  1;
        padding-top: 7px;
        padding-left: 10px;
        padding-right: 10px;
        width: max-content;
    }
</style>
