<!doctype html>
<html lang="en">
<head>
    <title>Bootstrap Table Examples</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
          content="An extended Bootstrap table with radio, checkbox, sort, pagination, and other added features.">
    <meta name="keywords"
          content="table, bootstrap, bootstrap plugin, bootstrap resources, bootstrap table, jQuery plugin">
    <meta name="author" content="Zhixin Wen, and Bootstrap table contributors">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/hint.css@2.6.0/hint.min.css">
    <link rel="stylesheet" href="assets/css/docs.min.css">
    <link rel="stylesheet" href="assets/css/template.css?v=146">

    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <style type="text/css" data-styled-components="FiaaB gTcftA caPIRE" data-styled-components-is-local="true">
        /* sc-component-id: sc-keyframes-FiaaB */
        @-webkit-keyframes FiaaB {
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes FiaaB {
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        /* sc-component-id: sc-keyframes-gTcftA */
        @-webkit-keyframes gTcftA {
            10%, 90% {
                -webkit-transform: translate3d(-1px, 0, 0);
                -ms-transform: translate3d(-1px, 0, 0);
                transform: translate3d(-1px, 0, 0);
            }
            20%, 80% {
                -webkit-transform: translate3d(2px, 0, 0);
                -ms-transform: translate3d(2px, 0, 0);
                transform: translate3d(2px, 0, 0);
            }
            30%, 50%, 70% {
                -webkit-transform: translate3d(-4px, 0, 0);
                -ms-transform: translate3d(-4px, 0, 0);
                transform: translate3d(-4px, 0, 0);
            }
            40%, 60% {
                -webkit-transform: translate3d(4px, 0, 0);
                -ms-transform: translate3d(4px, 0, 0);
                transform: translate3d(4px, 0, 0);
            }
        }

        @keyframes gTcftA {
            10%, 90% {
                -webkit-transform: translate3d(-1px, 0, 0);
                -ms-transform: translate3d(-1px, 0, 0);
                transform: translate3d(-1px, 0, 0);
            }
            20%, 80% {
                -webkit-transform: translate3d(2px, 0, 0);
                -ms-transform: translate3d(2px, 0, 0);
                transform: translate3d(2px, 0, 0);
            }
            30%, 50%, 70% {
                -webkit-transform: translate3d(-4px, 0, 0);
                -ms-transform: translate3d(-4px, 0, 0);
                transform: translate3d(-4px, 0, 0);
            }
            40%, 60% {
                -webkit-transform: translate3d(4px, 0, 0);
                -ms-transform: translate3d(4px, 0, 0);
                transform: translate3d(4px, 0, 0);
            }
        }

        /* sc-component-id: sc-keyframes-caPIRE */
        @-webkit-keyframes caPIRE {
            0% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            20% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            40% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            60% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            80% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            100% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
        }

        @keyframes caPIRE {
            0% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            20% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            40% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            60% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
            80% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
            100% {
                -webkit-transform: scale(.75);
                -ms-transform: scale(.75);
                transform: scale(.75);
            }
        }</style>
    <style>@-webkit-keyframes swal2-show {
               0% {
                   -webkit-transform: scale(.7);
                   transform: scale(.7)
               }
               45% {
                   -webkit-transform: scale(1.05);
                   transform: scale(1.05)
               }
               80% {
                   -webkit-transform: scale(.95);
                   transform: scale(.95)
               }
               100% {
                   -webkit-transform: scale(1);
                   transform: scale(1)
               }
           }

        @keyframes swal2-show {
            0% {
                -webkit-transform: scale(.7);
                transform: scale(.7)
            }
            45% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05)
            }
            80% {
                -webkit-transform: scale(.95);
                transform: scale(.95)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @-webkit-keyframes swal2-hide {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
            100% {
                -webkit-transform: scale(.5);
                transform: scale(.5);
                opacity: 0
            }
        }

        @keyframes swal2-hide {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
            100% {
                -webkit-transform: scale(.5);
                transform: scale(.5);
                opacity: 0
            }
        }

        @-webkit-keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }
            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }
            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }
            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }
            100% {
                top: 2.8125em;
                left: .875em;
                width: 1.5625em
            }
        }

        @keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }
            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }
            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }
            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }
            100% {
                top: 2.8125em;
                left: .875em;
                width: 1.5625em
            }
        }

        @-webkit-keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }
            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }
            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }
            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }
            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }
            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }
            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @-webkit-keyframes swal2-rotate-success-circular-line {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            100% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @keyframes swal2-rotate-success-circular-line {
            0% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            5% {
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg)
            }
            12% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
            100% {
                -webkit-transform: rotate(-405deg);
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }
            50% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }
            80% {
                margin-top: -.375em;
                -webkit-transform: scale(1.15);
                transform: scale(1.15)
            }
            100% {
                margin-top: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }
            50% {
                margin-top: 1.625em;
                -webkit-transform: scale(.4);
                transform: scale(.4);
                opacity: 0
            }
            80% {
                margin-top: -.375em;
                -webkit-transform: scale(1.15);
                transform: scale(1.15)
            }
            100% {
                margin-top: 0;
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }
        }

        @-webkit-keyframes swal2-animate-error-icon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            100% {
                -webkit-transform: rotateX(0);
                transform: rotateX(0);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-icon {
            0% {
                -webkit-transform: rotateX(100deg);
                transform: rotateX(100deg);
                opacity: 0
            }
            100% {
                -webkit-transform: rotateX(0);
                transform: rotateX(0);
                opacity: 1
            }
        }

        body.swal2-toast-shown .swal2-container {
            background-color: transparent
        }

        body.swal2-toast-shown .swal2-container.swal2-shown {
            background-color: transparent
        }

        body.swal2-toast-shown .swal2-container.swal2-top {
            top: 0;
            right: auto;
            bottom: auto;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-top-end, body.swal2-toast-shown .swal2-container.swal2-top-right {
            top: 0;
            right: 0;
            bottom: auto;
            left: auto
        }

        body.swal2-toast-shown .swal2-container.swal2-top-left, body.swal2-toast-shown .swal2-container.swal2-top-start {
            top: 0;
            right: auto;
            bottom: auto;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-center-left, body.swal2-toast-shown .swal2-container.swal2-center-start {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center-end, body.swal2-toast-shown .swal2-container.swal2-center-right {
            top: 50%;
            right: 0;
            bottom: auto;
            left: auto;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-left, body.swal2-toast-shown .swal2-container.swal2-bottom-start {
            top: auto;
            right: auto;
            bottom: 0;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom {
            top: auto;
            right: auto;
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-end, body.swal2-toast-shown .swal2-container.swal2-bottom-right {
            top: auto;
            right: 0;
            bottom: 0;
            left: auto
        }

        body.swal2-toast-column .swal2-toast {
            flex-direction: column;
            align-items: stretch
        }

        body.swal2-toast-column .swal2-toast .swal2-actions {
            flex: 1;
            align-self: stretch;
            height: 2.2em;
            margin-top: .3125em
        }

        body.swal2-toast-column .swal2-toast .swal2-loading {
            justify-content: center
        }

        body.swal2-toast-column .swal2-toast .swal2-input {
            height: 2em;
            margin: .3125em auto;
            font-size: 1em
        }

        body.swal2-toast-column .swal2-toast .swal2-validation-message {
            font-size: 1em
        }

        .swal2-popup.swal2-toast {
            flex-direction: row;
            align-items: center;
            width: auto;
            padding: .625em;
            box-shadow: 0 0 .625em #d9d9d9;
            overflow-y: hidden
        }

        .swal2-popup.swal2-toast .swal2-header {
            flex-direction: row
        }

        .swal2-popup.swal2-toast .swal2-title {
            flex-grow: 1;
            justify-content: flex-start;
            margin: 0 .6em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-footer {
            margin: .5em 0 0;
            padding: .5em 0 0;
            font-size: .8em
        }

        .swal2-popup.swal2-toast .swal2-close {
            position: initial;
            width: .8em;
            height: .8em;
            line-height: .8
        }

        .swal2-popup.swal2-toast .swal2-content {
            justify-content: flex-start;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-icon {
            width: 2em;
            min-width: 2em;
            height: 2em;
            margin: 0
        }

        .swal2-popup.swal2-toast .swal2-icon-text {
            font-size: 2em;
            font-weight: 700;
            line-height: 1em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            top: .875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: .3125em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: .3125em
        }

        .swal2-popup.swal2-toast .swal2-actions {
            height: auto;
            margin: 0 .3125em
        }

        .swal2-popup.swal2-toast .swal2-styled {
            margin: 0 .3125em;
            padding: .3125em .625em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-styled:focus {
            box-shadow: 0 0 0 .0625em #fff, 0 0 0 .125em rgba(50, 100, 150, .4)
        }

        .swal2-popup.swal2-toast .swal2-success {
            border-color: #a5dc86
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 2em;
            height: 2.8125em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.25em;
            left: -.9375em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 2em 2em;
            transform-origin: 2em 2em;
            border-radius: 4em 0 0 4em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.25em;
            left: .9375em;
            -webkit-transform-origin: 0 2em;
            transform-origin: 0 2em;
            border-radius: 0 4em 4em 0
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-fix {
            top: 0;
            left: .4375em;
            width: .4375em;
            height: 2.6875em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line] {
            height: .3125em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip] {
            top: 1.125em;
            left: .1875em;
            width: .75em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long] {
            top: .9375em;
            right: .1875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast.swal2-show {
            -webkit-animation: showSweetToast .5s;
            animation: showSweetToast .5s
        }

        .swal2-popup.swal2-toast.swal2-hide {
            -webkit-animation: hideSweetToast .2s forwards;
            animation: hideSweetToast .2s forwards
        }

        .swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-tip {
            -webkit-animation: animate-toast-success-tip .75s;
            animation: animate-toast-success-tip .75s
        }

        .swal2-popup.swal2-toast .swal2-animate-success-icon .swal2-success-line-long {
            -webkit-animation: animate-toast-success-long .75s;
            animation: animate-toast-success-long .75s
        }

        @-webkit-keyframes showSweetToast {
            0% {
                -webkit-transform: translateY(-.625em) rotateZ(2deg);
                transform: translateY(-.625em) rotateZ(2deg);
                opacity: 0
            }
            33% {
                -webkit-transform: translateY(0) rotateZ(-2deg);
                transform: translateY(0) rotateZ(-2deg);
                opacity: .5
            }
            66% {
                -webkit-transform: translateY(.3125em) rotateZ(2deg);
                transform: translateY(.3125em) rotateZ(2deg);
                opacity: .7
            }
            100% {
                -webkit-transform: translateY(0) rotateZ(0);
                transform: translateY(0) rotateZ(0);
                opacity: 1
            }
        }

        @keyframes showSweetToast {
            0% {
                -webkit-transform: translateY(-.625em) rotateZ(2deg);
                transform: translateY(-.625em) rotateZ(2deg);
                opacity: 0
            }
            33% {
                -webkit-transform: translateY(0) rotateZ(-2deg);
                transform: translateY(0) rotateZ(-2deg);
                opacity: .5
            }
            66% {
                -webkit-transform: translateY(.3125em) rotateZ(2deg);
                transform: translateY(.3125em) rotateZ(2deg);
                opacity: .7
            }
            100% {
                -webkit-transform: translateY(0) rotateZ(0);
                transform: translateY(0) rotateZ(0);
                opacity: 1
            }
        }

        @-webkit-keyframes hideSweetToast {
            0% {
                opacity: 1
            }
            33% {
                opacity: .5
            }
            100% {
                -webkit-transform: rotateZ(1deg);
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @keyframes hideSweetToast {
            0% {
                opacity: 1
            }
            33% {
                opacity: .5
            }
            100% {
                -webkit-transform: rotateZ(1deg);
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @-webkit-keyframes animate-toast-success-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }
            54% {
                top: .125em;
                left: .125em;
                width: 0
            }
            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }
            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }
            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @keyframes animate-toast-success-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }
            54% {
                top: .125em;
                left: .125em;
                width: 0
            }
            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }
            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }
            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @-webkit-keyframes animate-toast-success-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }
            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }
            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }
            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        @keyframes animate-toast-success-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }
            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }
            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }
            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden
        }

        body.swal2-height-auto {
            height: auto !important
        }

        body.swal2-no-backdrop .swal2-shown {
            top: auto;
            right: auto;
            bottom: auto;
            left: auto;
            background-color: transparent
        }

        body.swal2-no-backdrop .swal2-shown > .swal2-modal {
            box-shadow: 0 0 10px rgba(0, 0, 0, .4)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top {
            top: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top-left, body.swal2-no-backdrop .swal2-shown.swal2-top-start {
            top: 0;
            left: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-top-end, body.swal2-no-backdrop .swal2-shown.swal2-top-right {
            top: 0;
            right: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center {
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center-left, body.swal2-no-backdrop .swal2-shown.swal2-center-start {
            top: 50%;
            left: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-center-end, body.swal2-no-backdrop .swal2-shown.swal2-center-right {
            top: 50%;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom {
            bottom: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%)
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom-left, body.swal2-no-backdrop .swal2-shown.swal2-bottom-start {
            bottom: 0;
            left: 0
        }

        body.swal2-no-backdrop .swal2-shown.swal2-bottom-end, body.swal2-no-backdrop .swal2-shown.swal2-bottom-right {
            right: 0;
            bottom: 0
        }

        .swal2-container {
            display: flex;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding: 10px;
            background-color: transparent;
            z-index: 1060;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch
        }

        .swal2-container.swal2-top {
            align-items: flex-start
        }

        .swal2-container.swal2-top-left, .swal2-container.swal2-top-start {
            align-items: flex-start;
            justify-content: flex-start
        }

        .swal2-container.swal2-top-end, .swal2-container.swal2-top-right {
            align-items: flex-start;
            justify-content: flex-end
        }

        .swal2-container.swal2-center {
            align-items: center
        }

        .swal2-container.swal2-center-left, .swal2-container.swal2-center-start {
            align-items: center;
            justify-content: flex-start
        }

        .swal2-container.swal2-center-end, .swal2-container.swal2-center-right {
            align-items: center;
            justify-content: flex-end
        }

        .swal2-container.swal2-bottom {
            align-items: flex-end
        }

        .swal2-container.swal2-bottom-left, .swal2-container.swal2-bottom-start {
            align-items: flex-end;
            justify-content: flex-start
        }

        .swal2-container.swal2-bottom-end, .swal2-container.swal2-bottom-right {
            align-items: flex-end;
            justify-content: flex-end
        }

        .swal2-container.swal2-grow-fullscreen > .swal2-modal {
            display: flex !important;
            flex: 1;
            align-self: stretch;
            justify-content: center
        }

        .swal2-container.swal2-grow-row > .swal2-modal {
            display: flex !important;
            flex: 1;
            align-content: center;
            justify-content: center
        }

        .swal2-container.swal2-grow-column {
            flex: 1;
            flex-direction: column
        }

        .swal2-container.swal2-grow-column.swal2-bottom, .swal2-container.swal2-grow-column.swal2-center, .swal2-container.swal2-grow-column.swal2-top {
            align-items: center
        }

        .swal2-container.swal2-grow-column.swal2-bottom-left, .swal2-container.swal2-grow-column.swal2-bottom-start, .swal2-container.swal2-grow-column.swal2-center-left, .swal2-container.swal2-grow-column.swal2-center-start, .swal2-container.swal2-grow-column.swal2-top-left, .swal2-container.swal2-grow-column.swal2-top-start {
            align-items: flex-start
        }

        .swal2-container.swal2-grow-column.swal2-bottom-end, .swal2-container.swal2-grow-column.swal2-bottom-right, .swal2-container.swal2-grow-column.swal2-center-end, .swal2-container.swal2-grow-column.swal2-center-right, .swal2-container.swal2-grow-column.swal2-top-end, .swal2-container.swal2-grow-column.swal2-top-right {
            align-items: flex-end
        }

        .swal2-container.swal2-grow-column > .swal2-modal {
            display: flex !important;
            flex: 1;
            align-content: center;
            justify-content: center
        }

        .swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen) > .swal2-modal {
            margin: auto
        }

        @media all and (-ms-high-contrast: none),(-ms-high-contrast: active) {
            .swal2-container .swal2-modal {
                margin: 0 !important
            }
        }

        .swal2-container.swal2-fade {
            transition: background-color .1s
        }

        .swal2-container.swal2-shown {
            background-color: rgba(0, 0, 0, .4)
        }

        .swal2-popup {
            display: none;
            position: relative;
            flex-direction: column;
            justify-content: center;
            width: 32em;
            max-width: 100%;
            padding: 1.25em;
            border-radius: .3125em;
            background: #fff;
            font-family: inherit;
            font-size: 1rem;
            box-sizing: border-box
        }

        .swal2-popup:focus {
            outline: 0
        }

        .swal2-popup.swal2-loading {
            overflow-y: hidden
        }

        .swal2-popup .swal2-header {
            display: flex;
            flex-direction: column;
            align-items: center
        }

        .swal2-popup .swal2-title {
            display: block;
            position: relative;
            max-width: 100%;
            margin: 0 0 .4em;
            padding: 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            text-align: center;
            text-transform: none;
            word-wrap: break-word
        }

        .swal2-popup .swal2-actions {
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin: 1.25em auto 0;
            z-index: 1
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled[disabled] {
            opacity: .4
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:hover {
            background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1))
        }

        .swal2-popup .swal2-actions:not(.swal2-loading) .swal2-styled:active {
            background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2))
        }

        .swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-confirm {
            width: 2.5em;
            height: 2.5em;
            margin: .46875em;
            padding: 0;
            border: .25em solid transparent;
            border-radius: 100%;
            border-color: transparent;
            background-color: transparent !important;
            color: transparent;
            cursor: default;
            box-sizing: border-box;
            -webkit-animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .swal2-popup .swal2-actions.swal2-loading .swal2-styled.swal2-cancel {
            margin-right: 30px;
            margin-left: 30px
        }

        .swal2-popup .swal2-actions.swal2-loading :not(.swal2-styled).swal2-confirm::after {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-left: 5px;
            border: 3px solid #999;
            border-radius: 50%;
            border-right-color: transparent;
            box-shadow: 1px 1px 1px #fff;
            content: '';
            -webkit-animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            animation: swal2-rotate-loading 1.5s linear 0s infinite normal
        }

        .swal2-popup .swal2-styled {
            margin: .3125em;
            padding: .625em 2em;
            font-weight: 500;
            box-shadow: none
        }

        .swal2-popup .swal2-styled:not([disabled]) {
            cursor: pointer
        }

        .swal2-popup .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #3085d6;
            color: #fff;
            font-size: 1.0625em
        }

        .swal2-popup .swal2-styled.swal2-cancel {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #aaa;
            color: #fff;
            font-size: 1.0625em
        }

        .swal2-popup .swal2-styled:focus {
            outline: 0;
            box-shadow: 0 0 0 2px #fff, 0 0 0 4px rgba(50, 100, 150, .4)
        }

        .swal2-popup .swal2-styled::-moz-focus-inner {
            border: 0
        }

        .swal2-popup .swal2-footer {
            justify-content: center;
            margin: 1.25em 0 0;
            padding: 1em 0 0;
            border-top: 1px solid #eee;
            color: #545454;
            font-size: 1em
        }

        .swal2-popup .swal2-image {
            max-width: 100%;
            margin: 1.25em auto
        }

        .swal2-popup .swal2-close {
            position: absolute;
            top: 0;
            right: 0;
            justify-content: center;
            width: 1.2em;
            height: 1.2em;
            padding: 0;
            transition: color .1s ease-out;
            border: none;
            border-radius: 0;
            outline: initial;
            background: 0 0;
            color: #ccc;
            font-family: serif;
            font-size: 2.5em;
            line-height: 1.2;
            cursor: pointer;
            overflow: hidden
        }

        .swal2-popup .swal2-close:hover {
            -webkit-transform: none;
            transform: none;
            color: #f27474
        }

        .swal2-popup > .swal2-checkbox, .swal2-popup > .swal2-file, .swal2-popup > .swal2-input, .swal2-popup > .swal2-radio, .swal2-popup > .swal2-select, .swal2-popup > .swal2-textarea {
            display: none
        }

        .swal2-popup .swal2-content {
            justify-content: center;
            margin: 0;
            padding: 0;
            color: #545454;
            font-size: 1.125em;
            font-weight: 300;
            line-height: normal;
            z-index: 1;
            word-wrap: break-word
        }

        .swal2-popup #swal2-content {
            text-align: center
        }

        .swal2-popup .swal2-checkbox, .swal2-popup .swal2-file, .swal2-popup .swal2-input, .swal2-popup .swal2-radio, .swal2-popup .swal2-select, .swal2-popup .swal2-textarea {
            margin: 1em auto
        }

        .swal2-popup .swal2-file, .swal2-popup .swal2-input, .swal2-popup .swal2-textarea {
            width: 100%;
            transition: border-color .3s, box-shadow .3s;
            border: 1px solid #d9d9d9;
            border-radius: .1875em;
            font-size: 1.125em;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .06);
            box-sizing: border-box
        }

        .swal2-popup .swal2-file.swal2-inputerror, .swal2-popup .swal2-input.swal2-inputerror, .swal2-popup .swal2-textarea.swal2-inputerror {
            border-color: #f27474 !important;
            box-shadow: 0 0 2px #f27474 !important
        }

        .swal2-popup .swal2-file:focus, .swal2-popup .swal2-input:focus, .swal2-popup .swal2-textarea:focus {
            border: 1px solid #b4dbed;
            outline: 0;
            box-shadow: 0 0 3px #c4e6f5
        }

        .swal2-popup .swal2-file::-webkit-input-placeholder, .swal2-popup .swal2-input::-webkit-input-placeholder, .swal2-popup .swal2-textarea::-webkit-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file:-ms-input-placeholder, .swal2-popup .swal2-input:-ms-input-placeholder, .swal2-popup .swal2-textarea:-ms-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file::-ms-input-placeholder, .swal2-popup .swal2-input::-ms-input-placeholder, .swal2-popup .swal2-textarea::-ms-input-placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-file::placeholder, .swal2-popup .swal2-input::placeholder, .swal2-popup .swal2-textarea::placeholder {
            color: #ccc
        }

        .swal2-popup .swal2-range input {
            width: 80%
        }

        .swal2-popup .swal2-range output {
            width: 20%;
            font-weight: 600;
            text-align: center
        }

        .swal2-popup .swal2-range input, .swal2-popup .swal2-range output {
            height: 2.625em;
            margin: 1em auto;
            padding: 0;
            font-size: 1.125em;
            line-height: 2.625em
        }

        .swal2-popup .swal2-input {
            height: 2.625em;
            padding: 0 .75em
        }

        .swal2-popup .swal2-input[type=number] {
            max-width: 10em
        }

        .swal2-popup .swal2-file {
            font-size: 1.125em
        }

        .swal2-popup .swal2-textarea {
            height: 6.75em;
            padding: .75em
        }

        .swal2-popup .swal2-select {
            min-width: 50%;
            max-width: 100%;
            padding: .375em .625em;
            color: #545454;
            font-size: 1.125em
        }

        .swal2-popup .swal2-checkbox, .swal2-popup .swal2-radio {
            align-items: center;
            justify-content: center
        }

        .swal2-popup .swal2-checkbox label, .swal2-popup .swal2-radio label {
            margin: 0 .6em;
            font-size: 1.125em
        }

        .swal2-popup .swal2-checkbox input, .swal2-popup .swal2-radio input {
            margin: 0 .4em
        }

        .swal2-popup .swal2-validation-message {
            display: none;
            align-items: center;
            justify-content: center;
            padding: .625em;
            background: #f0f0f0;
            color: #666;
            font-size: 1em;
            font-weight: 300;
            overflow: hidden
        }

        .swal2-popup .swal2-validation-message::before {
            display: inline-block;
            width: 1.5em;
            min-width: 1.5em;
            height: 1.5em;
            margin: 0 .625em;
            border-radius: 50%;
            background-color: #f27474;
            color: #fff;
            font-weight: 600;
            line-height: 1.5em;
            text-align: center;
            content: '!';
            zoom: normal
        }

        @supports (-ms-accelerator:true) {
            .swal2-range input {
                width: 100% !important
            }

            .swal2-range output {
                display: none
            }
        }

        @media all and (-ms-high-contrast: none),(-ms-high-contrast: active) {
            .swal2-range input {
                width: 100% !important
            }

            .swal2-range output {
                display: none
            }
        }

        @-moz-document url-prefix() {
            .swal2-close:focus {
                outline: 2px solid rgba(50, 100, 150, .4)
            }
        }

        .swal2-icon {
            position: relative;
            justify-content: center;
            width: 5em;
            height: 5em;
            margin: 1.25em auto 1.875em;
            border: .25em solid transparent;
            border-radius: 50%;
            line-height: 5em;
            cursor: default;
            box-sizing: content-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            zoom: normal
        }

        .swal2-icon-text {
            font-size: 3.75em
        }

        .swal2-icon.swal2-error {
            border-color: #f27474
        }

        .swal2-icon.swal2-error .swal2-x-mark {
            position: relative;
            flex-grow: 1
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            display: block;
            position: absolute;
            top: 2.3125em;
            width: 2.9375em;
            height: .3125em;
            border-radius: .125em;
            background-color: #f27474
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: 1.0625em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: 1em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal2-icon.swal2-warning {
            border-color: #facea8;
            color: #f8bb86
        }

        .swal2-icon.swal2-info {
            border-color: #9de0f6;
            color: #3fc3ee
        }

        .swal2-icon.swal2-question {
            border-color: #c9dae1;
            color: #87adbd
        }

        .swal2-icon.swal2-success {
            border-color: #a5dc86
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 3.75em;
            height: 7.5em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.4375em;
            left: -2.0635em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 3.75em 3.75em;
            transform-origin: 3.75em 3.75em;
            border-radius: 7.5em 0 0 7.5em
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.6875em;
            left: 1.875em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 3.75em;
            transform-origin: 0 3.75em;
            border-radius: 0 7.5em 7.5em 0
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            position: absolute;
            top: -.25em;
            left: -.25em;
            width: 100%;
            height: 100%;
            border: .25em solid rgba(165, 220, 134, .3);
            border-radius: 50%;
            z-index: 2;
            box-sizing: content-box
        }

        .swal2-icon.swal2-success .swal2-success-fix {
            position: absolute;
            top: .5em;
            left: 1.625em;
            width: .4375em;
            height: 5.625em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            z-index: 1
        }

        .swal2-icon.swal2-success [class^=swal2-success-line] {
            display: block;
            position: absolute;
            height: .3125em;
            border-radius: .125em;
            background-color: #a5dc86;
            z-index: 2
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
            top: 2.875em;
            left: .875em;
            width: 1.5625em;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
            top: 2.375em;
            right: .5em;
            width: 2.9375em;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .swal2-progresssteps {
            align-items: center;
            margin: 0 0 1.25em;
            padding: 0;
            font-weight: 600
        }

        .swal2-progresssteps li {
            display: inline-block;
            position: relative
        }

        .swal2-progresssteps .swal2-progresscircle {
            width: 2em;
            height: 2em;
            border-radius: 2em;
            background: #3085d6;
            color: #fff;
            line-height: 2em;
            text-align: center;
            z-index: 20
        }

        .swal2-progresssteps .swal2-progresscircle:first-child {
            margin-left: 0
        }

        .swal2-progresssteps .swal2-progresscircle:last-child {
            margin-right: 0
        }

        .swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep {
            background: #3085d6
        }

        .swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep ~ .swal2-progresscircle {
            background: #add8e6
        }

        .swal2-progresssteps .swal2-progresscircle.swal2-activeprogressstep ~ .swal2-progressline {
            background: #add8e6
        }

        .swal2-progresssteps .swal2-progressline {
            width: 2.5em;
            height: .4em;
            margin: 0 -1px;
            background: #3085d6;
            z-index: 10
        }

        [class^=swal2] {
            -webkit-tap-highlight-color: transparent
        }

        .swal2-show {
            -webkit-animation: swal2-show .3s;
            animation: swal2-show .3s
        }

        .swal2-show.swal2-noanimation {
            -webkit-animation: none;
            animation: none
        }

        .swal2-hide {
            -webkit-animation: swal2-hide .15s forwards;
            animation: swal2-hide .15s forwards
        }

        .swal2-hide.swal2-noanimation {
            -webkit-animation: none;
            animation: none
        }

        .swal2-rtl .swal2-close {
            right: auto;
            left: 0
        }

        .swal2-animate-success-icon .swal2-success-line-tip {
            -webkit-animation: swal2-animate-success-line-tip .75s;
            animation: swal2-animate-success-line-tip .75s
        }

        .swal2-animate-success-icon .swal2-success-line-long {
            -webkit-animation: swal2-animate-success-line-long .75s;
            animation: swal2-animate-success-line-long .75s
        }

        .swal2-animate-success-icon .swal2-success-circular-line-right {
            -webkit-animation: swal2-rotate-success-circular-line 4.25s ease-in;
            animation: swal2-rotate-success-circular-line 4.25s ease-in
        }

        .swal2-animate-error-icon {
            -webkit-animation: swal2-animate-error-icon .5s;
            animation: swal2-animate-error-icon .5s
        }

        .swal2-animate-error-icon .swal2-x-mark {
            -webkit-animation: swal2-animate-error-x-mark .5s;
            animation: swal2-animate-error-x-mark .5s
        }

        @-webkit-keyframes swal2-rotate-loading {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes swal2-rotate-loading {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @media print {
            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
                overflow-y: scroll !important
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) > [aria-hidden=true] {
                display: none
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container {
                position: initial !important
            }
        }
    </style>
    <link href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <script id="_carbonads_projs" type="text/javascript"
            src="https://srv.carbonads.net/ads/CK7DL2J7.json?segment=placement:bootstrap-tablecom&amp;callback=_carbonads_go"></script>
    <style>
        .glot-sub-active {
            color: #1296ba !important;
        }

        .glot-sub-hovered {
            color: #1296ba !important;
        }

        .glot-sub-clzz {
            cursor: pointer;

            lineHeight: 1.2;
            font-size: 28px;
            color: #FFCC00;
            background: rgba(17, 17, 17, 0.7);

        }

        .glot-sub-clzz:hover {
            color: #1296ba !important;
        }

        .ej-trans-sub {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999999;
            cursor: move;
        }

        .ej-trans-sub > span {
            color: #3CF9ED;
            font-size: 18px;
            text-align: center;
            padding: 0 16px;
            line-height: 1.5;
            background: rgba(32, 26, 25, 0.8);
        / / text-shadow: 0 px 1 px 4 px black;
            padding: 0 8px;

            lineHeight: 1.2;
            font-size: 16px;
            color: #0CB1C7;
            background: rgba(67, 65, 65, 0.7);

        }

        .ej-main-sub {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999999;
            cursor: move;
            padding: 0 8px;
        }

        .ej-main-sub > span {
            color: white;
            font-size: 20px;
            line-height: 1.5;
            text-align: center;
            background: rgba(32, 26, 25, 0.8);
        / / text-shadow: 0 px 1 px 4 px black;
            padding: 2px 8px;

            lineHeight: 1.2;
            font-size: 28px;
            color: #FFCC00;
            background: rgba(17, 17, 17, 0.7);

        }

        .ej-main-sub .glot-sub-clzz {
            background: transparent !important
        }

        .tran-subtitle > span {
            cursor: pointer;
            padding-left: 10px;
            top: 2px;
            position: relative;
        }

        .tran-subtitle > span > span {
            position: absolute;
            top: -170%;
            background: rgba(0, 0, 0, 0.5);
            font-size: 13px;
            line-height: 20px;
            padding: 2px 8px;
            color: white;
            display: none;
            border-radius: 4px;
            white-space: nowrap;
            left: -50%;
            font-weight: normal;
        }

        .view-icon-copy-main-sub:hover > span, .view-icon-edit-sub:hover > span, .view-icon-copy-tran-sub:hover > span {
            display: block;
        }

        .tran-subtitle > span > svg {
            width: 16px;
            height: 16px;
            pointer-events: none;
        }

        .view-icon-copy-main-sub > svg {
            pointer-events: none;
            color: #FFCC00
        }

        .view-icon-copy-tran-sub {
            padding-left: 0 !important;
            padding-right: 8px !important;
        }

        .view-icon-copy-tran-sub > svg {
            pointer-events: none;
            color: #0CB1C7
        }


    </style>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-all.min.js"></script>
    <script
        src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
</head>
<body>

<div id="example">
    <script>
        init({
            title: 'Welcome Examples',
            desc: 'Examples with checkbox, sort, pagination, export, detailView and other added features.',
            links: [
                'bootstrap-table.min.css'
            ],
            scripts: [
                'https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js',
                'bootstrap-table.min.js',
                'https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table-locale-all.min.js',
                'extensions/export/bootstrap-table-export.min.js'
            ]
        })
    </script>

    <style>
        .select,
        #locale {
            width: 100%;
        }

        .like {
            margin-right: 10px;
        }
    </style>


    <div class="bootstrap-table bootstrap5">
        <div class="fixed-table-toolbar">
            <div class="bs-bars float-left">
                <div id="toolbar">
                    <button id="remove" class="btn btn-danger" disabled="">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
            <div class="columns columns-right btn-group float-right">
                <button class="btn btn-secondary" type="button" name="paginationSwitch"
                        aria-label="Hide/Show pagination" title="Hide/Show pagination"><i
                        class="bi bi-caret-down-square"></i></button>
                <button class="btn btn-secondary" type="button" name="refresh" aria-label="Refresh" title="Refresh"><i
                        class="bi bi-arrow-clockwise"></i></button>
                <button class="btn btn-secondary" type="button" name="toggle" aria-label="Show card view"
                        title="Show card view"><i class="bi bi-toggle-off"></i></button>
                <button class="btn btn-secondary" type="button" name="fullscreen" aria-label="Fullscreen"
                        title="Fullscreen"><i class="bi bi-arrows-move"></i></button>
                <div class="keep-open btn-group" title="Columns">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-label="Columns" title="Columns">
                        <i class="bi bi-list-ul"></i>

                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right"><label
                            class="dropdown-item dropdown-item-marker"><input type="checkbox" class="toggle-all"
                                                                              checked="checked"> <span>Toggle all</span></label>
                        <div class="dropdown-divider"></div>
                        <label class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="id"
                                                                                 value="1" checked="checked"> <span>Item ID</span></label><label
                            class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="name"
                                                                              value="2" checked="checked"> <span>Item Name</span></label><label
                            class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="price"
                                                                              value="3" checked="checked"> <span>Item Price</span></label><label
                            class="dropdown-item dropdown-item-marker"><input type="checkbox" data-field="operate"
                                                                              value="4" checked="checked"> <span>Item Operate</span></label>
                    </div>
                </div>
                <div class="export btn-group">
                    <button class="btn btn-secondary dropdown-toggle" aria-label="Export" data-bs-toggle="dropdown"
                            type="button" title="Export data">
                        <i class="bi bi-download"></i>

                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item " href="#" data-type="json">JSON</a><a class="dropdown-item " href="#"
                                                                                       data-type="xml">XML</a><a
                            class="dropdown-item " href="#" data-type="csv">CSV</a><a class="dropdown-item " href="#"
                                                                                      data-type="txt">TXT</a><a
                            class="dropdown-item " href="#" data-type="sql">SQL</a><a class="dropdown-item " href="#"
                                                                                      data-type="excel">MS-Excel</a>
                    </div>
                </div>
            </div>
            <div class="float-right search btn-group">
                <input class="form-control

        search-input" type="search" placeholder="Search" autocomplete="off">
            </div>
        </div>

        <div class="fixed-table-container fixed-height has-footer" style="height: 434px; padding-bottom: 149.5px;">
            <div class="fixed-table-header" style="margin-right: 0px;">
                <table class="table table-bordered table-hover" style="width: 1440px;">
                    <thead class="">
                    <tr>
                        <th class="detail" rowspan="2">
                            <div class="fht-cell" style="width: 32px;"></div>
                        </th>
                        <th class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; "
                            rowspan="2" data-field="state">
                            <div class="th-inner "><label><input name="btSelectAll"
                                                                 type="checkbox"><span></span></label></div>
                            <div class="fht-cell" style="width: 37px;"></div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; " rowspan="2" data-field="id">
                            <div class="th-inner sortable both">Item ID</div>
                            <div class="fht-cell" style="width: 287.297px;"></div>
                        </th>
                        <th style="text-align: center; " colspan="3">
                            <div class="th-inner ">Item Detail</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: center; " data-field="name" data-not-first-th="">
                            <div class="th-inner sortable both">Item Name</div>
                            <div class="fht-cell" style="width: 368.109px;"></div>
                        </th>
                        <th style="text-align: center; " data-field="price">
                            <div class="th-inner sortable both">Item Price</div>
                            <div class="fht-cell" style="width: 346.469px;"></div>
                        </th>
                        <th style="text-align: center; " data-field="operate">
                            <div class="th-inner ">Item Operate</div>
                            <div class="fht-cell" style="width: 362.125px;"></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="fixed-table-body">
                <div class="fixed-table-loading table table-bordered table-hover fixed-table-border"
                     style="top: 99px; width: 1440px;">
      <span class="loading-wrap">
      <span class="loading-text" style="font-size: 32px;">Loading, please wait</span>
      <span class="animation-wrap"><span class="animation-dot"></span></span>
      </span>

                </div>
                <table id="table" data-toolbar="#toolbar" data-search="true" data-show-refresh="true"
                       data-show-toggle="true" data-show-fullscreen="true" data-show-columns="true"
                       data-show-columns-toggle-all="true" data-detail-view="true" data-show-export="true"
                       data-click-to-select="true" data-detail-formatter="detailFormatter"
                       data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true"
                       data-id-field="id" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true"
                       data-side-pagination="server"
                       data-url="https://examples.wenzhixin.net.cn/examples/bootstrap_table/data"
                       data-response-handler="responseHandler" class="table table-bordered table-hover"
                       style="margin-top: -98.5px;">
                    <thead class="">
                    <tr>
                        <th class="detail" rowspan="2">
                            <div class="fht-cell"></div>
                        </th>
                        <th class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; "
                            rowspan="2" data-field="state">
                            <div class="th-inner "><label><input name="btSelectAll"
                                                                 type="checkbox"><span></span></label></div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; " rowspan="2" data-field="id">
                            <div class="th-inner sortable both">Item ID</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="text-align: center; " colspan="3">
                            <div class="th-inner ">Item Detail</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: center; " data-field="name" data-not-first-th="">
                            <div class="th-inner sortable both">Item Name</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="text-align: center; " data-field="price">
                            <div class="th-inner sortable both">Item Price</div>
                            <div class="fht-cell"></div>
                        </th>
                        <th style="text-align: center; " data-field="operate">
                            <div class="th-inner ">Item Operate</div>
                            <div class="fht-cell"></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-index="0" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="0" name="btSelectItem" type="checkbox" value="0">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">0</td>
                        <td style="text-align: center; ">Item 0</td>
                        <td style="text-align: center; ">$0</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="1" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="1" name="btSelectItem" type="checkbox" value="1">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">1</td>
                        <td style="text-align: center; ">Item 1</td>
                        <td style="text-align: center; ">$1</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="2" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="2" name="btSelectItem" type="checkbox" value="2">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">2</td>
                        <td style="text-align: center; ">Item 2</td>
                        <td style="text-align: center; ">$2</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="3" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="3" name="btSelectItem" type="checkbox" value="3">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">3</td>
                        <td style="text-align: center; ">Item 3</td>
                        <td style="text-align: center; ">$3</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="4" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="4" name="btSelectItem" type="checkbox" value="4">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">4</td>
                        <td style="text-align: center; ">Item 4</td>
                        <td style="text-align: center; ">$4</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="5" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="5" name="btSelectItem" type="checkbox" value="5">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">5</td>
                        <td style="text-align: center; ">Item 5</td>
                        <td style="text-align: center; ">$5</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="6" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="6" name="btSelectItem" type="checkbox" value="6">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">6</td>
                        <td style="text-align: center; ">Item 6</td>
                        <td style="text-align: center; ">$6</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="7" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="7" name="btSelectItem" type="checkbox" value="7">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">7</td>
                        <td style="text-align: center; ">Item 7</td>
                        <td style="text-align: center; ">$7</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="8" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="8" name="btSelectItem" type="checkbox" value="8">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">8</td>
                        <td style="text-align: center; ">Item 8</td>
                        <td style="text-align: center; ">$8</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <tr data-index="9" data-has-detail-view="true">
                        <td>
                            <a class="detail-icon" href="#">
                                <i class="bi bi-plus"></i>
                            </a>
                        </td>
                        <td class="bs-checkbox " style="text-align: center; vertical-align: middle; width: 36px; ">
                            <label>
                                <input data-index="9" name="btSelectItem" type="checkbox" value="9">
                                <span></span>
                            </label></td>
                        <td style="text-align: center; vertical-align: middle; ">9</td>
                        <td style="text-align: center; ">Item 9</td>
                        <td style="text-align: center; ">$9</td>
                        <td style="text-align: center; "><a class="like" href="javascript:void(0)" title="Like"><i
                                    class="fa fa-heart"></i></a> <a class="remove" href="javascript:void(0)"
                                                                    title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    </tbody>
                </table>
                <div class="fixed-table-border" style="width: 1440px; height: 0px;"></div>
            </div>
            <div class="fixed-table-footer" style="margin-right: 17px;">
                <table class="table table-bordered table-hover" style="width: 1440px;">
                    <thead>
                    <tr>
                        <th class="detail">
                            <div class="th-inner"></div>
                            <div class="fht-cell" style="width: 32px;"></div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; ">
                            <div class="th-inner"></div>
                            <div class="fht-cell" style="width: 37px;"></div>
                        </th>
                        <th style="text-align: center; vertical-align: middle; ">
                            <div class="th-inner">Total</div>
                            <div class="fht-cell" style="width: 287.297px;"></div>
                        </th>
                        <th style="text-align: center; ">
                            <div class="th-inner">10</div>
                            <div class="fht-cell" style="width: 368.109px;"></div>
                        </th>
                        <th style="text-align: center; ">
                            <div class="th-inner">$45</div>
                            <div class="fht-cell" style="width: 346.469px;"></div>
                        </th>
                        <th style="text-align: center; ">
                            <div class="th-inner"></div>
                            <div class="fht-cell" style="width: 362.125px;"></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="fixed-table-pagination" style="">
            <div class="float-left pagination-detail"><span class="pagination-info">
      Showing 1 to 10 of 800 rows
      </span>
                <div class="page-list">
                    <div class="btn-group dropdown dropup">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        <span class="page-size">
        10
        </span>
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu"><a class="dropdown-item active" href="#">10</a><a
                                class="dropdown-item " href="#">25</a><a class="dropdown-item " href="#">50</a><a
                                class="dropdown-item " href="#">100</a><a class="dropdown-item " href="#">All</a></div>
                    </div>
                    rows per page
                </div>
            </div>
            <div class="float-right pagination">
                <ul class="pagination">
                    <li class="page-item page-pre"><a class="page-link" aria-label="previous page"
                                                      href="javascript:void(0)">‹</a></li>
                    <li class="page-item active"><a class="page-link" aria-label="to page 1"
                                                    href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" aria-label="to page 2" href="javascript:void(0)">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" aria-label="to page 3" href="javascript:void(0)">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" aria-label="to page 4" href="javascript:void(0)">4</a>
                    </li>
                    <li class="page-item"><a class="page-link" aria-label="to page 5" href="javascript:void(0)">5</a>
                    </li>
                    <li class="page-item page-last-separator disabled"><a class="page-link" aria-label=""
                                                                          href="javascript:void(0)">...</a></li>
                    <li class="page-item"><a class="page-link" aria-label="to page 80" href="javascript:void(0)">80</a>
                    </li>
                    <li class="page-item page-next"><a class="page-link" aria-label="next page"
                                                       href="javascript:void(0)">›</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <script>
        var $table = $('#table')
        var $remove = $('#remove')
        var selections = []

        function getIdSelections() {
            return $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.id
            })
        }

        function responseHandler(res) {
            $.each(res.rows, function (i, row) {
                row.state = $.inArray(row.id, selections) !== -1
            })
            return res
        }

        function detailFormatter(index, row) {
            var html = []
            $.each(row, function (key, value) {
                html.push('<p><b>' + key + ':</b> ' + value + '</p>')
            })
            return html.join('')
        }

        function operateFormatter(value, row, index) {
            return [
                '<a class="like" href="javascript:void(0)" title="Like">',
                '<i class="fa fa-heart"></i>',
                '</a>  ',
                '<a class="remove" href="javascript:void(0)" title="Remove">',
                '<i class="fa fa-trash"></i>',
                '</a>'
            ].join('')
        }

        window.operateEvents = {
            'click .like': function (e, value, row, index) {
                alert('You click like action, row: ' + JSON.stringify(row))
            },
            'click .remove': function (e, value, row, index) {
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                })
            }
        }

        function totalTextFormatter(data) {
            return 'Total'
        }

        function totalNameFormatter(data) {
            return data.length
        }

        function totalPriceFormatter(data) {
            var field = this.field
            return '$' + data.map(function (row) {
                return +row[field].substring(1)
            }).reduce(function (sum, i) {
                return sum + i
            }, 0)
        }

        function initTable() {
            $table.bootstrapTable('destroy').bootstrapTable({
                height: 550,
                locale: $('#locale').val(),
                columns: [
                    [{
                        field: 'state',
                        checkbox: true,
                        rowspan: 2,
                        align: 'center',
                        valign: 'middle'
                    }, {
                        title: 'Item ID',
                        field: 'id',
                        rowspan: 2,
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                        footerFormatter: totalTextFormatter
                    }, {
                        title: 'Item Detail',
                        colspan: 3,
                        align: 'center'
                    }],
                    [{
                        field: 'name',
                        title: 'Item Name',
                        sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    }, {
                        field: 'price',
                        title: 'Item Price',
                        sortable: true,
                        align: 'center',
                        footerFormatter: totalPriceFormatter
                    }, {
                        field: 'operate',
                        title: 'Item Operate',
                        align: 'center',
                        clickToSelect: false,
                        events: window.operateEvents,
                        formatter: operateFormatter
                    }]
                ]
            })
            $table.on('check.bs.table uncheck.bs.table ' +
                'check-all.bs.table uncheck-all.bs.table',
                function () {
                    $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)

                    // save your data, here just save the current page
                    selections = getIdSelections()
                    // push or splice the selections if you want to save all data selections
                })
            $table.on('all.bs.table', function (e, name, args) {
                console.log(name, args)
            })
            $remove.click(function () {
                var ids = getIdSelections()
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: ids
                })
                $remove.prop('disabled', true)
            })
        }

        function mounted() {
            initTable()

            $('#locale').change(initTable)
        }
    </script>
</div>
<pre class="source-pre"><code id="source" class="html"></code></pre>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sprintf-js@1.1.2/dist/sprintf.min.js"></script>
<script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked@3.0.8/marked.min.js"></script>
<script src="https://unpkg.com/flexibility@2.0.1/flexibility.js"></script>
<script src="assets/js/template.js?v=146"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-132747866-1"></script>
<script>
    window.dataLayer = window.dataLayer || []

    function gtag() {
        window.dataLayer.push(arguments)
    }

    gtag('js', new Date())
    gtag('config', 'UA-132747866-1')
</script>


<div id="eJOY__extension_root" class="eJOY__extension_root_class" style="all: unset;"></div>
</body>
</html>
