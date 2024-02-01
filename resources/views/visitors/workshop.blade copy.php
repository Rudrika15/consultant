@extends('layouts.VisitorApp')
@section('content')

<head>

    <title>Events</title>




    {{--
    <link href="//allevents.in/css/combined-responsive.css?v=v11706677602v11706682609" rel="stylesheet"> --}}

    <!--touch icons -->


</head>

<body>

    <!-- Overlay page -->
    <div id="overlay" class="direct">
        <div class="transition-wrap">
            <div id="event-container" class="container event-detail ">
                <div id="event-detail-fade" class="ev1">

                    <style type="text/css">
                        .slot-ticket-btn {
                            width: 220px;
                            border-radius: 3px
                        }

                        .event-head .overlay-h1 {
                            height: 35px;
                            margin-left: 0;
                            margin-bottom: 5px;
                            width: 100%;
                        }

                        .event-head.fixed-head .overlay-h1 {
                            margin: 0;
                        }

                        .event-detail .event-ticket {
                            float: left;
                            margin-top: unset;
                            border-top: 0;
                            padding-top: 10px
                        }

                        .event-detail .event-head .span9 .display_start_time {
                            font-family: pn-regular;
                            font-size: 15px;
                            color: #555
                        }

                        .event-detail .event-head .span9 {
                            width: 650px
                        }

                        .event-detail .event-head .span9 .org-name a {
                            text-decoration: none;
                            color: #333;
                            display: table-cell;
                            vertical-align: middle;
                            text-align: left;
                            float: left;
                            width: 100%;
                            margin-bottom: 15px
                        }

                        .org-name {
                            color: #555
                        }

                        .book-slot-block {
                            float: left;
                            width: 100%
                        }

                        .event-thumb-parent {
                            margin-left: 0;
                            width: 100px !important;
                            height: 100px !important;
                            min-height: auto !important;
                            display: inline-block;
                            border-radius: 4px
                        }

                        .head-details {
                            display: inline-block;
                            vertical-align: top;
                            width: 59%;
                            box-sizing: border-box;
                            padding: 0 0 0 20px;
                        }

                        .book-btn-1 {
                            display: inline-block;
                            width: 30%;
                            box-sizing: border-box;
                            float: right;
                            text-align: right
                        }

                        .book-btn-1 .slot-ticket-btn {
                            width: 200px;
                            margin-top: 0px !important;
                            margin-right: 20px;
                            padding: 12px;
                            font-size: 18px;
                            text-shadow: none
                        }

                        .org-badge {
                            font-size: 11px;
                            font-weight: 300;
                            background: #E7ECF1;
                            color: #222;
                            text-shadow: none
                        }

                        .interested-count {
                            width: 200px;
                            text-align: center;
                            margin-right: 20px;
                            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                            font-weight: 600;
                            float: right;
                            margin-top: 10px;
                            color: #2ca36d;
                        }

                        .fixed-head .interested-count {
                            margin-right: 30px;
                        }

                        @media(min-width: 1200px) {
                            .event-detail .event-head .span9 {
                                width: 680px
                            }
                        }

                        @media (max-width: 979px) and (min-width: 768px) {
                            .span9 {
                                width: 484px;
                                margin-left: 0
                            }

                            .slot-tick-price {
                                padding-left: 10px
                            }

                            .event-thumb-parent {
                                display: none
                            }

                            .head-details {
                                width: 65%
                            }
                        }

                        @media(max-width:767px) {
                            .book-slot-block {
                                box-sizing: border-box;
                                width: 100%;
                                float: left
                            }

                            .wdiv {
                                padding: 20px
                            }

                            .event-detail .social-div .event-share-btns {
                                margin-bottom: 0
                            }

                            .event-head .overlay-h1 {
                                height: auto;
                                font-size: 20px;
                                line-height: 30px;
                                margin-bottom: 10px;
                                font-weight: 700;
                                color: #2e363f;
                            }

                            .slot-ticket-btn {
                                width: 100%;
                                float: left;
                                box-sizing: border-box
                            }

                            .overlay-h1 {
                                display: inline-block;
                                vertical-align: top;
                                width: 100%;
                                box-sizing: border-box;
                                padding: 0;
                                margin-left: 0;
                                margin-top: 0
                            }

                            .slot-ticket-btn {
                                width: 100%;
                                margin-top: 10px
                            }

                            .event-thumb-parent {
                                width: 100% !important;
                                min-height: 217px !important;
                                margin-bottom: 10px !important;
                            }

                            .event-detail .event-thumb {
                                width: 100% !important
                            }

                            .head-details {
                                width: 100%;
                                padding: 0
                            }

                            .book-btn-1 {
                                width: 100%;
                                float: left;
                                text-align: left
                            }

                            .book-btn-1 .slot-ticket-btn {
                                width: 100%;
                                margin-right: 0;
                                padding: 8px 12px;
                                font-size: 16px
                            }

                            .org-name {
                                display: none
                            }

                            .interested-count {
                                width: 100%;
                                margin-right: auto;
                                text-align: center;
                            }
                        }

                        .event-detail .event-thumb {
                            min-height: unset;
                        }

                        @media (max-width: 486px) {
                            .event-mb-banner {
                                height: unset !important;
                                min-height: unset !important;
                            }
                        }

                        .event-info {
                            display: none !important;
                        }
                    </style>

                    <div class="event-head wdiv padding-10" style="box-shadow: 0 1px 2px #aaa;">
                        <div style="max-width: 1170px; margin: auto;">
                            <div class="span3 event-thumb-parent event-mb-banner" style="margin:0;">
                                <img class="event-thumb check_img" src="https://cdn2.allevents.in/thumbs/thumb65b7a8998dad3.jpg" alt="img" />
                            </div>

                            <div class="padding-10 head-details hidden-phone">
                                <h1 itemprop="name" class="overlay-h1 event-full-name" title='Event Name'>Consultant
                                    Cube Event</h1>

                                <div class="social-bar-1" style="display: inline-block;">
                                    {{-- <button class="btn btn-link track no-text-decoration trackga4"
                                        id="interested-event-btn" data-status="not-interested"
                                        data-track="EventPage-v1|topInfo|interested"
                                        data-track-ga4="interested|(event_page_v5,top_info)"
                                        style="color:#575C67;padding-left:0;padding-right:6px;margin-top:0px !important;font-size:14px;outline: none;"><i
                                            class="icon icon-star-empty mr5 no-text-decoration"
                                            style="text-decoration:none;"></i>I'm Interested</button> --}}

                                    <button class="btn btn-link track trackga4" data-track="EventPage-v1|topInfo|shareEvent" title="Share Event" onclick="get_modal_with_params('sharer-modal-v2.php', {'event_id': '80007798400289','aff':''});" style="color:#575C67;padding-left: 9px;padding-right:6px;font-size:14px;outline: none;">
                                        <i class="icon icon-share"></i> Share</button>
                                </div>
                            </div>

                            <div class="book-btn-1" style="min-height: 100px;display: flex;align-items: center;">
                                <div class="book-slot-block">
                                    <button class="btn btn-warning btn-large slot-ticket-btn regi track-discovery" data-discovery-key="user_get_tickets" onClick="book_ticket_slot(event); return false;"><i class="icon-ticket mr5"></i>
                                        Tickets <i class="icon slot-loader"></i></button>
                                </div>

                                <div class="tickt-float-btn-cont hide">
                                    <span style="text-align: center; display: block; margin-bottom: 10px; font-size: 16px; color: green; font-weight: 600;">INR
                                        299
                                    </span>
                                    <a href="#" class="btn btn-warning btn-large float-tckt-btn track-discovery" data-discovery-key="user_get_tickets" onclick="book_ticket_slot(event); return false;"><i class="icon-ticket mr5"></i>Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blank-fix-box hide" style="height: 130px;"></div>
                    <div class="row">

                        <div class="span8 desc-span8">

                            <style type="text/css">
                                /*EventPagev2*/
                                .event-description {
                                    line-height: 26px;
                                }
                            </style>

                            <div class="event-description wdiv padding-10 mb0 " data-fcount="1">

                                <img itemprop="image" class="event-banner-image hidden-phone lazy" src="https://cdn2.allevents.in/thumbs/thumb65b7a8998dad3.jpg" data-title="" alt="event img" title="Event Name" width="730" height="730">
                                <img src="event img" alt="" /></noscript>

                                <span style="font-size: 16px; line-height: 26px; text-transform: none; 
                                    font-weight: 600; font-family: Open Sans, Helvetica Neue, Helvetica, 
                                    Arial, sans-serif; color: #2e363f; margin-bottom: 5px; 
                                    display: inline-block;">Event Name / Title</span>
                                <br />
                                <div itemprop="description" class="event-description-html">
                                    <p><strong>Event Name / Title</strong></p>
                                    <p><strong>Event Date</strong></p>
                                    <p><br /></p>
                                    <p>Event Details</p>
                                    <p>T&amp;C*</p>
                                    <p><br /></p>
                                    <ul>
                                        <li><strong>Single Ticket is valid for one day only (Saturday/ Sunday according
                                                to ticket purchased)</strong></li>
                                        <li><strong>There are separate tickets for 10 AM to 5 PM &amp; 6 PM to 11
                                                PM.</strong></li>
                                        <li><strong>Gold Pass - 10 AM to 5 PM </strong></li>
                                        <li><strong>Diamond Pass - All Day </strong></li>
                                        <li><strong>Entry allowed till 5 PM only (Gold Pass)</strong></li>
                                        <li><strong>Re-entry won't be allowed</strong></li>
                                        <li><strong>Please note that the date, venue, and timing of the event are
                                                subject to change in the event of any unforeseen circumstances.</strong>
                                        </li>
                                        <li><strong>We appreciate your understanding and will notify you promptly of any
                                                adjustments to ensure a seamless experience.</strong></li>
                                    </ul>
                                </div>

                                {{-- <div class="youtube" data-embed="_gLhgsktbBQ">
                                    <div class="play-button"></div><img class="lazy" alt="Youtube Video"
                                        data-original="https://img.youtube.com/vi/_gLhgsktbBQ/hqdefault.jpg"
                                        title="Play Video">
                                </div><br /> </p> --}}

                                <div id="description-viewed" data-section="description"></div>
                            </div>
                        </div>

                        <div class="span4">
                            <h2 class="event-info">Event Information</h2>
                            <style type="text/css">
                                .location-box .head,
                                .datetime .head {
                                    float: left;
                                    width: 100%;
                                    display: block;
                                }

                                .location-box .center span,
                                .datetime .center span {
                                    padding: 3px 0 5px;
                                    float: left;
                                    width: 100%;
                                }

                                .location-box .wdiv-label,
                                .datetime .wdiv-label {
                                    margin: 0px;
                                }

                                .location-box,
                                .datetime {
                                    padding: 12px;
                                }

                                .location-box .center span i {
                                    padding-right: 3px;
                                    float: left;
                                    width: 5%;
                                    padding-top: 8px;
                                }

                                .datetime .center span i {
                                    padding-right: 3px;
                                }

                                .datetime .center .time_slot {
                                    margin-top: 35px;
                                    font-size: 13px;
                                }

                                .datetime .center .time_slot .time_left {
                                    display: inline-block;
                                    padding: 0;
                                    width: auto;
                                    font-weight: bold;
                                    margin-right: 15px;
                                }

                                .datetime .center .time_slot .time_right {
                                    display: inline;
                                    padding: 0;
                                    width: auto;
                                }

                                @media(min-width: 1200px) {
                                    .location-box {
                                        padding: 20px;
                                    }

                                    .location-box .head .wdiv-label {
                                        margin-bottom: 0px;
                                    }

                                    .location-box .divider-2 {
                                        border-bottom: 2px solid #f5f5f5;
                                    }

                                    .location-box .center span {
                                        padding: 5px 0 5px;
                                    }

                                    .location-box .center span i {
                                        padding-right: 5px;
                                    }

                                    .datetime {
                                        padding: 20px;
                                    }

                                    .datetime .head .wdiv-label {
                                        margin-bottom: 0px;
                                    }

                                    .datetime .divider-2 {
                                        border-bottom: 2px solid #f5f5f5;
                                    }

                                    .datetime .center span {
                                        padding: 10px 0 0 0;
                                    }

                                    .datetime .center span i {
                                        padding-right: 5px;
                                    }
                                }
                            </style>


                            <div class="wdiv datetime hidden-phone">
                                <div class="head">
                                    <h3 class="wdiv-label">Date & Time</h3>
                                </div>
                                <div class="center">
                                    <i class="icon-time" style="padding-right: 5px; float: left; width: 5%; padding-top: 8px;"></i>
                                    <span style="max-width: 84%; width: 100%; display: inline-block; vertical-align: middle; margin: 0; padding-top: 5px;">
                                        <span style="padding: 0" data-recurring="" data-stime="1706954400" data-etime="1707087600" data-tz="+05:30">
                                            Date & time<br /><small>(GMT+05:30)</small></span>
                                    </span>
                                </div>
                            </div>


                            <div class="wdiv location-box hidden-phone">
                                <div class="head">
                                    <h3 class="wdiv-label">Location</h3>
                                </div>
                                <div class="center">
                                    <span>
                                        <i class="icon-map-marker"></i>

                                        <p style="max-width: 84%; width: 100%; display: inline-block; vertical-align: middle; margin: 0;">
                                            <span class="full-venue" style="max-width: 96%; box-sizing: border-box; clear: both; display: inline-block; vertical-align: middle;word-break: break-word;">
                                                Event Address
                                            </span>
                                </div>
                            </div>

                            <style type="text/css">
                                .copy-url-block {
                                    padding: 20px;
                                    text-align: center;
                                    padding-top: 10px;
                                }

                                .copy-url-block #copy-event-url {
                                    height: 31px;
                                    line-height: 31px;
                                    width: 88%;
                                    box-sizing: border-box;
                                }

                                @media(min-width: 767px) and (max-width: 986px) {
                                    .copy-url-block #copy-event-url {
                                        display: block;
                                        margin-bottom: 10px;
                                        width: 100%
                                    }

                                    .copy-url-block .btn-copy {
                                        display: block;
                                    }
                                }
                            </style>
                            <div class="pull-left input-append copy-url-block wdiv padding-20" style="padding: 20px; padding-top: 10px; text-align: left;">
                                <button class="btn btn-block btn-flat mb20 ghref" target="_blank"><i class="icon icon-heart mr5"></i> Recommend this event to Friends</button>
                                <input type="text" id="copy-event-url" value="event link">
                                <a href="#" class="btn btn-flat btn-default btn-copy track track-count" data-eid="80007798400289" data-count-name="eu_cpy" data-track="EventPage|copy-event|SharerBox" onclick="copyurlToClipboard('#copy-event-url',event);return false;"><i class="icon icon-copy"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection