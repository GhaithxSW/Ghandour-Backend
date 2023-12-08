<style>
    @media screen and (max-width: 460px) {
        .text-links {
            display: none;
        }
    }

    .footer-bottom {
        background: #fff;
        /* z-index: 1030; */
        z-index: 0;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        -webkit-transition: 0.3s right, 0s padding;
        transition: 0.3s right, 0s padding;
        backdrop-filter: blur(31px);
        padding: 11px 16px 0 20px;
        -webkit-box-shadow: 0 6px 10px 0 rgba(255, 255, 255, 0.14), 0 1px 18px 0 rgba(255, 255, 255, 0.12), 0 3px 5px -1px rgba(255, 255, 255, 0.2);
        -moz-box-shadow: 0 6px 10px 0 rgba(255, 255, 255, 0.14), 0 1px 18px 0 rgba(255, 255, 255, 0.12), 0 3px 5px -1px rgba(255, 255, 255, 0.2);
        box-shadow: 0 6px 10px 0 rgba(255, 255, 255, 0.14), 0 1px 18px 0 rgba(255, 255, 255, 0.12), 0 3px 5px -1px rgba(255, 255, 255, 0.2);
        background-color: rgb(255 255 255 / 90%) !important;
        -webkit-backdrop-filter: saturate(200%) blur(6px);
        backdrop-filter: saturate(200%) blur(6px);
        border: 1px solid #e0e6ed;
        box-shadow: -18px 20px 10.3px -23px rgb(0 0 0 / 15%);
    }
</style>

<div class="row layout-top-spacing footer-bottom">

    <div class="footer-section f-section-1 text-center">
        <p class=""><b><span class="text-links">{{ __('trans.rights') }}</span> <a target="_blank"
                    href="/admin-panel-management/dashboard">{{ __('trans.bhoothat') }}</a> Copyright © <span class="dynamic-year">2023</span></b>
        </p>
    </div>
</div>
