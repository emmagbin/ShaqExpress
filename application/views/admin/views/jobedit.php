    <?php include(APPPATH . 'views/admin/common/header.php'); ?>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css'> -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css'>
    <style>
        .note-editor {

            margin-bottom: 5rem !important;


        }
    </style>
    </head>

    <body>
        <?php include(APPPATH . 'views/admin/common/preloader.php'); ?>
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">
                <?php include(APPPATH . 'views/admin/common/topbar.php'); ?>
                <?php include(APPPATH . 'views/admin/common/sidebar_right.php'); ?>
                <?php include(APPPATH . 'views/admin/common/showchat.php'); ?>
                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">

                        <?php if ($role === 'Admin' || $role === 'Developer' || $role === 'jobseeker') {; ?>
                            <?php include(APPPATH . 'views/admin/common/sidemenuDefault.php'); ?>
                            }
                        <?php
                        } else { ?>
                            <?php include(APPPATH . 'views/admin/common/sidemenu.php'); ?>
                        <?php } ?>

                        <!--================================= theme body that will be changing =============================-->
                        <?php include(APPPATH . 'views/admin/jobs/edit.php'); ?>
                        <!-- =============================================================================================== -->
                    </div>
                </div>
            </div>
        </div>


        <!-- partial -->


        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'>
        </script>

        <!-- <script type="text/javascript" src="assets/admin/files/bower_components/jquery/dist/jquery.min.js"></script> -->
        <script type="text/javascript" src="assets/admin/files/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- <script type="text/javascript" src="assets/admin/files/bower_components/popper/dist/umd/popper.min.js"></script> -->
        <script type="text/javascript" src="assets/admin/files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- jquery slimscroll js -->
        <script type="text/javascript" src="assets/admin/files/bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- modernizr js -->
        <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/modernizr.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/modernizr/feature-detects/css-scrollbars.js"></script>


        <!-- i18next.min.js -->
        <!-- <script type="text/javascript" src="assets/admin/files/bower_components/i18next/i18next.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/bower_components/jquery-i18next/jquery-i18next.min.js"></script> -->
        <!--Forms - Wizard js-->
        <script src="assets/admin/files/bower_components/jquery.cookie/jquery.cookie.js"></script>
        <script src="assets/admin/files/bower_components/jquery.steps/build/jquery.steps.js"></script>
        <script src="assets/admin/files/bower_components/jquery-validation/dist/jquery.validate.js"></script>
        <!-- Validation js -->




        <script type="text/javascript" src="assets/admin/files/assets/pages/form-validation/validate.js"></script>

        <script>
            'use strict';
            $(document).ready(function() {

                $("#basic-forms").steps({
                    headerTag: "h3",
                    bodyTag: "fieldset",
                    transitionEffect: "slideLeft",
                    autoFocus: true
                });
                $("#verticle-wizard").steps({
                    headerTag: "h3",
                    bodyTag: "fieldset",
                    transitionEffect: "slide",
                    stepsOrientation: "vertical",
                    autoFocus: true
                });

                $("#design-wizard").steps({
                    headerTag: "h3",
                    bodyTag: "fieldset",
                    transitionEffect: "slideLeft",
                    autoFocus: true
                });




                var form = $("#example-advanced-form").show();

                form.steps({
                    headerTag: "h3",
                    bodyTag: "fieldset",
                    transitionEffect: "slideLeft",
                    onStepChanging: function(event, currentIndex, newIndex) {

                        // Allways allow previous action even if the current form is not valid!
                        if (currentIndex > newIndex) {
                            return true;
                        }
                        // Forbid next action on "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                            return false;
                        }
                        // Needed in some cases if the user went back (clean up)
                        if (currentIndex < newIndex) {
                            // To remove error styles
                            form.find(".body:eq(" + newIndex + ") label.error").remove();
                            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                        }
                        form.validate().settings.ignore = ":disabled,:hidden";
                        return form.valid();
                    },
                    onStepChanged: function(event, currentIndex, priorIndex) {

                        // Used to skip the "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                            form.steps("next");
                        }
                        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3) {
                            form.steps("previous");
                        }
                    },
                    onFinishing: function(event, currentIndex) {

                        form.validate().settings.ignore = ":disabled";
                        return form.valid();
                    },
                    onFinished: function(event, currentIndex) {

                        var JobDescription = $('#summernote1').summernote('code');
                        var Benefits = $('#summernote3').summernote('code');
                        var JobRequirement = $('#summernote2').summernote('code');
                        var JobTitle = $('#JobTitle').val();
                        var CompanyName = $('#CompanyName').val();
                        var JobType = $('#JobType').val();
                        var JobCategory = $('#JobCategory').val();
                        var ExpectedSalary = $('#ExpectedSalary').val();
                        var JobRegion = $('#JobRegion').val();
                        var Town = $('#Town').val();
                        var ApplicationStartDate = $('#startDate').val();
                        var ApplicationClosingDate = $('#ClosingDate').val();
                        var myid = $('#myid').val();

                        // alert(JobDescription);
                        //  alert(Benefits);
                        //   alert(JobRequirement);

                        if (JobDescription == "" || JobDescription == null) {

                            $('.messagesUpdate').html("Please Enter Job Description");
                        } else if (JobRequirement == "" || JobRequirement == null) {
                            $('.messagesUpdate').html("Please Enter Job Requirement");
                        } else if (JobTitle == "" || JobTitle == null) {
                            $('.messagesUpdate').html("Please Enter Job Title");
                        } else if (CompanyName == "" || CompanyName == null) {
                            $('.messagesUpdate').html("Please Enter Company Name");
                        } else if (JobType == "" || JobType == null) {
                            $('.messagesUpdate').html("Please Enter Job Type");
                        } else if (JobCategory == "" || JobCategory == null) {
                            $('.messagesUpdate').html("Please Enter Job Category");
                        } else if (ExpectedSalary == "" || ExpectedSalary == null) {
                            $('.messagesUpdate').html("Please Enter Expected Salary");
                        } else if (JobRegion == "" || JobRegion == null) {
                            $('.messagesUpdate').html("Please Enter Job Region");
                        } else if (Town == "" || Town == null) {
                            $('.messagesUpdate').html("Please Enter Town");
                        } else if (ApplicationStartDate == "" || ApplicationStartDate == null) {
                            $('.messagesUpdate').html("Please Enter Application Start Date");
                        } else if (ApplicationClosingDate == "" || ApplicationClosingDate == null) {
                            $('.messagesUpdate').html("Please Enter Application Closing Date");
                        } else {
                            // alert(creatorid);

                            $('.messagesUpdate').html("");


                            $.ajax({
                                type: 'POST',
                                data: {
                                    JobTitle: JobTitle,
                                    CompanyName: CompanyName,
                                    JobType: JobType,
                                    JobCategory: JobCategory,
                                    ExpectedSalary: ExpectedSalary,
                                    JobRegion: JobRegion,
                                    Town: Town,
                                    ApplicationStartDate: ApplicationStartDate,
                                    ApplicationClosingDate: ApplicationClosingDate,
                                    JobDescription: JobDescription,
                                    Benefits: Benefits,
                                    JobRequirement: JobRequirement,
                                    myid: myid
                                },
                                url: '<?php echo site_url('JobsPortal_Controller/update_post'); ?>',
                                success: function(result) {

                                    setTimeout(function() {
                                        window.location.href = "<?php echo site_url('jobs'); ?>";
                                      
                                    }, 1000);
                                    // }
                                    $('.messagesUpdate').html(result);
                                    toastr.success('success', {
                                        timeOut: 3000
                                    });


                                }
                            });




                        }


                    }
                }).validate({
                    errorPlacement: function errorPlacement(error, element) {

                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password-2"
                        }
                    }
                });
            });
        </script>
        <!-- Custom js -->
        <!-- <script src="assets/admin/files/assets/pages/forms-wizard-validation/form-wizard.js"></script> -->
        <script src="assets/admin/files/assets/js/pcoded.min.js"></script>
        <script src="assets/admin/files/assets/js/vartical-layout.min.js"></script>
        <script src="assets/admin/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="assets/admin/files/assets/js/script.js"></script>



        <script>
            /*! Summernote v0.8.12 | (c) 2013- Alan Hong and other contributors | MIT license */ ! function(t, e) {
                if ("object" == typeof exports && "object" == typeof module) module.exports = e(require("jQuery"));
                else if ("function" == typeof define && define.amd) define(["jQuery"], e);
                else {
                    var o = "object" == typeof exports ? e(require("jQuery")) : e(t.jQuery);
                    for (var i in o)("object" == typeof exports ? exports : t)[i] = o[i]
                }
            }(window, function(t) {
                return function(t) {
                    var e = {};

                    function o(i) {
                        if (e[i]) return e[i].exports;
                        var n = e[i] = {
                            i,
                            l: !1,
                            exports: {}
                        };
                        return t[i].call(n.exports, n, n.exports, o), n.l = !0, n.exports
                    }
                    return o.m = t, o.c = e, o.d = function(t, e, i) {
                        o.o(t, e) || Object.defineProperty(t, e, {
                            enumerable: !0,
                            get: i
                        })
                    }, o.r = function(t) {
                        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
                            value: "Module"
                        }), Object.defineProperty(t, "__esModule", {
                            value: !0
                        })
                    }, o.t = function(t, e) {
                        if (1 & e && (t = o(t)), 8 & e) return t;
                        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
                        var i = Object.create(null);
                        if (o.r(i), Object.defineProperty(i, "default", {
                                enumerable: !0,
                                value: t
                            }), 2 & e && "string" != typeof t)
                            for (var n in t) o.d(i, n, function(e) {
                                return t[e]
                            }.bind(null, n));
                        return i
                    }, o.n = function(t) {
                        var e = t && t.__esModule ? function() {
                            return t.default
                        } : function() {
                            return t
                        };
                        return o.d(e, "a", e), e
                    }, o.o = function(t, e) {
                        return Object.prototype.hasOwnProperty.call(t, e)
                    }, o.p = "", o(o.s = 52)
                }({
                    0: function(e, o) {
                        e.exports = t
                    },
                    1: function(t, e, o) {
                        "use strict";
                        var i = o(0),
                            n = o.n(i);
                        class s {
                            constructor(t, e, o, i) {
                                this.markup = t, this.children = e, this.options = o, this.callback = i
                            }
                            render(t) {
                                const e = n()(this.markup);
                                if (this.options && this.options.contents && e.html(this.options.contents), this.options && this.options.className && e.addClass(this.options.className), this.options && this.options.data && n.a.each(this.options.data, (t, o) => {
                                        e.attr("data-" + t, o)
                                    }), this.options && this.options.click && e.on("click", this.options.click), this.children) {
                                    const t = e.find(".note-children-container");
                                    this.children.forEach(o => {
                                        o.render(t.length ? t : e)
                                    })
                                }
                                return this.callback && this.callback(e, this.options), this.options && this.options.callback && this.options.callback(e), t && t.append(e), e
                            }
                        }
                        e.a = {
                            create: (t, e) => (function() {
                                const o = "object" == typeof arguments[1] ? arguments[1] : arguments[0];
                                let i = Array.isArray(arguments[0]) ? arguments[0] : [];
                                return o && o.children && (i = o.children), new s(t, i, o, e)
                            })
                        }
                    },
                    2: function(t, e) {
                        (function(e) {
                            t.exports = e
                        }).call(this, {})
                    },
                    3: function(t, e, o) {
                        "use strict";
                        var i = o(0),
                            n = o.n(i);
                        n.a.summernote = n.a.summernote || {
                            lang: {}
                        }, n.a.extend(n.a.summernote.lang, {
                            "en-US": {
                                font: {
                                    bold: "Bold",
                                    italic: "Italic",
                                    underline: "Underline",
                                    clear: "Remove Font Style",
                                    height: "Line Height",
                                    name: "Font Family",
                                    strikethrough: "Strikethrough",
                                    subscript: "Subscript",
                                    superscript: "Superscript",
                                    size: "Font Size"
                                },
                                image: {
                                    image: "Picture",
                                    insert: "Insert Image",
                                    resizeFull: "Resize full",
                                    resizeHalf: "Resize half",
                                    resizeQuarter: "Resize quarter",
                                    resizeNone: "Original size",
                                    floatLeft: "Float Left",
                                    floatRight: "Float Right",
                                    floatNone: "Remove float",
                                    shapeRounded: "Shape: Rounded",
                                    shapeCircle: "Shape: Circle",
                                    shapeThumbnail: "Shape: Thumbnail",
                                    shapeNone: "Shape: None",
                                    dragImageHere: "Drag image or text here",
                                    dropImage: "Drop image or Text",
                                    selectFromFiles: "Select from files",
                                    maximumFileSize: "Maximum file size",
                                    maximumFileSizeError: "Maximum file size exceeded.",
                                    url: "Image URL",
                                    remove: "Remove Image",
                                    original: "Original"
                                },
                                video: {
                                    video: "Video",
                                    videoLink: "Video Link",
                                    insert: "Insert Video",
                                    url: "Video URL",
                                    providers: "(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)"
                                },
                                link: {
                                    link: "Link",
                                    insert: "Insert Link",
                                    unlink: "Unlink",
                                    edit: "Edit",
                                    textToDisplay: "Text to display",
                                    url: "To what URL should this link go?",
                                    openInNewWindow: "Open in new window"
                                },
                                table: {
                                    table: "Table",
                                    addRowAbove: "Add row above",
                                    addRowBelow: "Add row below",
                                    addColLeft: "Add column left",
                                    addColRight: "Add column right",
                                    delRow: "Delete row",
                                    delCol: "Delete column",
                                    delTable: "Delete table"
                                },
                                hr: {
                                    insert: "Insert Horizontal Rule"
                                },
                                style: {
                                    style: "Style",
                                    p: "Normal",
                                    blockquote: "Quote",
                                    pre: "Code",
                                    h1: "Header 1",
                                    h2: "Header 2",
                                    h3: "Header 3",
                                    h4: "Header 4",
                                    h5: "Header 5",
                                    h6: "Header 6"
                                },
                                lists: {
                                    unordered: "Unordered list",
                                    ordered: "Ordered list"
                                },
                                options: {
                                    help: "Help",
                                    fullscreen: "Full Screen",
                                    codeview: "Code View"
                                },
                                paragraph: {
                                    paragraph: "Paragraph",
                                    outdent: "Outdent",
                                    indent: "Indent",
                                    left: "Align left",
                                    center: "Align center",
                                    right: "Align right",
                                    justify: "Justify full"
                                },
                                color: {
                                    recent: "Recent Color",
                                    more: "More Color",
                                    background: "Background Color",
                                    foreground: "Foreground Color",
                                    transparent: "Transparent",
                                    setTransparent: "Set transparent",
                                    reset: "Reset",
                                    resetToDefault: "Reset to default",
                                    cpSelect: "Select"
                                },
                                shortcut: {
                                    shortcuts: "Keyboard shortcuts",
                                    close: "Close",
                                    textFormatting: "Text formatting",
                                    action: "Action",
                                    paragraphFormatting: "Paragraph formatting",
                                    documentStyle: "Document Style",
                                    extraKeys: "Extra keys"
                                },
                                help: {
                                    insertParagraph: "Insert Paragraph",
                                    undo: "Undoes the last command",
                                    redo: "Redoes the last command",
                                    tab: "Tab",
                                    untab: "Untab",
                                    bold: "Set a bold style",
                                    italic: "Set a italic style",
                                    underline: "Set a underline style",
                                    strikethrough: "Set a strikethrough style",
                                    removeFormat: "Clean a style",
                                    justifyLeft: "Set left align",
                                    justifyCenter: "Set center align",
                                    justifyRight: "Set right align",
                                    justifyFull: "Set full align",
                                    insertUnorderedList: "Toggle unordered list",
                                    insertOrderedList: "Toggle ordered list",
                                    outdent: "Outdent on current paragraph",
                                    indent: "Indent on current paragraph",
                                    formatPara: "Change current block's format as a paragraph(P tag)",
                                    formatH1: "Change current block's format as H1",
                                    formatH2: "Change current block's format as H2",
                                    formatH3: "Change current block's format as H3",
                                    formatH4: "Change current block's format as H4",
                                    formatH5: "Change current block's format as H5",
                                    formatH6: "Change current block's format as H6",
                                    insertHorizontalRule: "Insert horizontal rule",
                                    "linkDialog.show": "Show Link Dialog"
                                },
                                history: {
                                    undo: "Undo",
                                    redo: "Redo"
                                },
                                specialChar: {
                                    specialChar: "SPECIAL CHARACTERS",
                                    select: "Select Special characters"
                                }
                            }
                        });
                        const s = "function" == typeof define && o(2),
                            r = ["sans-serif", "serif", "monospace", "cursive", "fantasy"];

                        function a(t) {
                            return -1 === n.a.inArray(t.toLowerCase(), r) ? `'${t}'` : t
                        }
                        const l = navigator.userAgent,
                            c = /MSIE|Trident/i.test(l);
                        let h;
                        if (c) {
                            let t = /MSIE (\d+[.]\d+)/.exec(l);
                            t && (h = parseFloat(t[1])), (t = /Trident\/.*rv:([0-9]{1,}[.0-9]{0,})/.exec(l)) && (h = parseFloat(t[1]))
                        }
                        const d = /Edge\/\d+/.test(l);
                        let u = !!window.CodeMirror;
                        const p = "ontouchstart" in window || navigator.MaxTouchPoints > 0 || navigator.msMaxTouchPoints > 0,
                            m = c || d ? "DOMCharacterDataModified DOMSubtreeModified DOMNodeInserted" : "input";
                        var f = {
                            isMac: navigator.appVersion.indexOf("Mac") > -1,
                            isMSIE: c,
                            isEdge: d,
                            isFF: !d && /firefox/i.test(l),
                            isPhantom: /PhantomJS/i.test(l),
                            isWebkit: !d && /webkit/i.test(l),
                            isChrome: !d && /chrome/i.test(l),
                            isSafari: !d && /safari/i.test(l),
                            browserVersion: h,
                            jqueryVersion: parseFloat(n.a.fn.jquery),
                            isSupportAmd: s,
                            isSupportTouch: p,
                            hasCodeMirror: u,
                            isFontInstalled: function(t) {
                                const e = "Comic Sans MS" === t ? "Courier New" : "Comic Sans MS";
                                var o = document.createElement("canvas").getContext("2d");
                                o.font = "200px '" + e + "'";
                                const i = o.measureText("mmmmmmmmmmwwwww").width;
                                return o.font = "200px " + a(t) + ', "' + e + '"', i !== o.measureText("mmmmmmmmmmwwwww").width
                            },
                            isW3CRangeSupport: !!document.createRange,
                            inputEventName: m,
                            genericFontFamilies: r,
                            validFontName: a
                        };
                        let g = 0;
                        var b = {
                            eq: function(t) {
                                return function(e) {
                                    return t === e
                                }
                            },
                            eq2: function(t, e) {
                                return t === e
                            },
                            peq2: function(t) {
                                return function(e, o) {
                                    return e[t] === o[t]
                                }
                            },
                            ok: function() {
                                return !0
                            },
                            fail: function() {
                                return !1
                            },
                            self: function(t) {
                                return t
                            },
                            not: function(t) {
                                return function() {
                                    return !t.apply(t, arguments)
                                }
                            },
                            and: function(t, e) {
                                return function(o) {
                                    return t(o) && e(o)
                                }
                            },
                            invoke: function(t, e) {
                                return function() {
                                    return t[e].apply(t, arguments)
                                }
                            },
                            uniqueId: function(t) {
                                const e = ++g + "";
                                return t ? t + e : e
                            },
                            rect2bnd: function(t) {
                                const e = $(document);
                                return {
                                    top: t.top + e.scrollTop(),
                                    left: t.left + e.scrollLeft(),
                                    width: t.right - t.left,
                                    height: t.bottom - t.top
                                }
                            },
                            invertObject: function(t) {
                                const e = {};
                                for (const o in t) t.hasOwnProperty(o) && (e[t[o]] = o);
                                return e
                            },
                            namespaceToCamel: function(t, e) {
                                return (e = e || "") + t.split(".").map(function(t) {
                                    return t.substring(0, 1).toUpperCase() + t.substring(1)
                                }).join("")
                            },
                            debounce: function(t, e, o) {
                                let i;
                                return function() {
                                    const n = this,
                                        s = arguments,
                                        r = o && !i;
                                    clearTimeout(i), i = setTimeout(() => {
                                        i = null, o || t.apply(n, s)
                                    }, e), r && t.apply(n, s)
                                }
                            },
                            isValidUrl: function(t) {
                                return /[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/=]*)/gi.test(t)
                            }
                        };

                        function v(t) {
                            return t[0]
                        }

                        function k(t) {
                            return t[t.length - 1]
                        }

                        function C(t) {
                            return t.slice(1)
                        }

                        function y(t, e) {
                            if (t && t.length && e) {
                                if (t.indexOf) return -1 !== t.indexOf(e);
                                if (t.contains) return t.contains(e)
                            }
                            return !1
                        }
                        var w = {
                            head: v,
                            last: k,
                            initial: function(t) {
                                return t.slice(0, t.length - 1)
                            },
                            tail: C,
                            prev: function(t, e) {
                                if (t && t.length && e) {
                                    const o = t.indexOf(e);
                                    return -1 === o ? null : t[o - 1]
                                }
                                return null
                            },
                            next: function(t, e) {
                                if (t && t.length && e) {
                                    const o = t.indexOf(e);
                                    return -1 === o ? null : t[o + 1]
                                }
                                return null
                            },
                            find: function(t, e) {
                                for (let o = 0, i = t.length; o < i; o++) {
                                    const i = t[o];
                                    if (e(i)) return i
                                }
                            },
                            contains: y,
                            all: function(t, e) {
                                for (let o = 0, i = t.length; o < i; o++)
                                    if (!e(t[o])) return !1;
                                return !0
                            },
                            sum: function(t, e) {
                                return e = e || b.self, t.reduce(function(t, o) {
                                    return t + e(o)
                                }, 0)
                            },
                            from: function(t) {
                                const e = [],
                                    o = t.length;
                                let i = -1;
                                for (; ++i < o;) e[i] = t[i];
                                return e
                            },
                            isEmpty: function(t) {
                                return !t || !t.length
                            },
                            clusterBy: function(t, e) {
                                return t.length ? C(t).reduce(function(t, o) {
                                    const i = k(t);
                                    return e(k(i), o) ? i[i.length] = o : t[t.length] = [o], t
                                }, [
                                    [v(t)]
                                ]) : []
                            },
                            compact: function(t) {
                                const e = [];
                                for (let o = 0, i = t.length; o < i; o++) t[o] && e.push(t[o]);
                                return e
                            },
                            unique: function(t) {
                                const e = [];
                                for (let o = 0, i = t.length; o < i; o++) y(e, t[o]) || e.push(t[o]);
                                return e
                            }
                        };
                        const x = String.fromCharCode(160);

                        function S(t) {
                            return t && n()(t).hasClass("note-editable")
                        }

                        function I(t) {
                            return t = t.toUpperCase(),
                                function(e) {
                                    return e && e.nodeName.toUpperCase() === t
                                }
                        }

                        function T(t) {
                            return t && 3 === t.nodeType
                        }

                        function N(t) {
                            return t && /^BR|^IMG|^HR|^IFRAME|^BUTTON|^INPUT|^AUDIO|^VIDEO|^EMBED/.test(t.nodeName.toUpperCase())
                        }

                        function E(t) {
                            return !S(t) && (t && /^DIV|^P|^LI|^H[1-7]/.test(t.nodeName.toUpperCase()))
                        }
                        const R = I("PRE"),
                            L = I("LI");
                        const A = I("TABLE"),
                            F = I("DATA");

                        function P(t) {
                            return !(M(t) || H(t) || D(t) || E(t) || A(t) || z(t) || F(t))
                        }

                        function H(t) {
                            return t && /^UL|^OL/.test(t.nodeName.toUpperCase())
                        }
                        const D = I("HR");

                        function B(t) {
                            return t && /^TD|^TH/.test(t.nodeName.toUpperCase())
                        }
                        const z = I("BLOCKQUOTE");

                        function M(t) {
                            return B(t) || z(t) || S(t)
                        }
                        const O = I("A");
                        const U = I("BODY");
                        const j = f.isMSIE && f.browserVersion < 11 ? "&nbsp;" : "<br>";

                        function K(t) {
                            return T(t) ? t.nodeValue.length : t ? t.childNodes.length : 0
                        }

                        function W(t) {
                            const e = K(t);
                            return 0 === e || (!T(t) && 1 === e && t.innerHTML === j || !(!w.all(t.childNodes, T) || "" !== t.innerHTML))
                        }

                        function q(t) {
                            N(t) || K(t) || (t.innerHTML = j)
                        }

                        function V(t, e) {
                            for (; t;) {
                                if (e(t)) return t;
                                if (S(t)) break;
                                t = t.parentNode
                            }
                            return null
                        }

                        function _(t, e) {
                            e = e || b.fail;
                            const o = [];
                            return V(t, function(t) {
                                return S(t) || o.push(t), e(t)
                            }), o
                        }

                        function G(t, e) {
                            e = e || b.fail;
                            const o = [];
                            for (; t && !e(t);) o.push(t), t = t.nextSibling;
                            return o
                        }

                        function Z(t, e) {
                            const o = e.nextSibling;
                            let i = e.parentNode;
                            return o ? i.insertBefore(t, o) : i.appendChild(t), t
                        }

                        function Q(t, e) {
                            return n.a.each(e, function(e, o) {
                                t.appendChild(o)
                            }), t
                        }

                        function Y(t) {
                            return 0 === t.offset
                        }

                        function J(t) {
                            return t.offset === K(t.node)
                        }

                        function X(t) {
                            return Y(t) || J(t)
                        }

                        function tt(t, e) {
                            for (; t && t !== e;) {
                                if (0 !== ot(t)) return !1;
                                t = t.parentNode
                            }
                            return !0
                        }

                        function et(t, e) {
                            if (!e) return !1;
                            for (; t && t !== e;) {
                                if (ot(t) !== K(t.parentNode) - 1) return !1;
                                t = t.parentNode
                            }
                            return !0
                        }

                        function ot(t) {
                            let e = 0;
                            for (; t = t.previousSibling;) e += 1;
                            return e
                        }

                        function it(t) {
                            return !!(t && t.childNodes && t.childNodes.length)
                        }

                        function nt(t, e) {
                            let o, i;
                            if (0 === t.offset) {
                                if (S(t.node)) return null;
                                o = t.node.parentNode, i = ot(t.node)
                            } else it(t.node) ? i = K(o = t.node.childNodes[t.offset - 1]) : (o = t.node, i = e ? 0 : t.offset - 1);
                            return {
                                node: o,
                                offset: i
                            }
                        }

                        function st(t, e) {
                            let o, i;
                            if (K(t.node) === t.offset) {
                                if (S(t.node)) return null;
                                o = t.node.parentNode, i = ot(t.node) + 1
                            } else it(t.node) ? (o = t.node.childNodes[t.offset], i = 0) : (o = t.node, i = e ? K(t.node) : t.offset + 1);
                            return {
                                node: o,
                                offset: i
                            }
                        }

                        function rt(t, e) {
                            return t.node === e.node && t.offset === e.offset
                        }

                        function at(t, e) {
                            let o = e && e.isSkipPaddingBlankHTML;
                            const i = e && e.isNotSplitEdgePoint,
                                n = e && e.isDiscardEmptySplits;
                            if (n && (o = !0), X(t) && (T(t.node) || i)) {
                                if (Y(t)) return t.node;
                                if (J(t)) return t.node.nextSibling
                            }
                            if (T(t.node)) return t.node.splitText(t.offset); {
                                const e = t.node.childNodes[t.offset],
                                    i = Z(t.node.cloneNode(!1), t.node);
                                return Q(i, G(e)), o || (q(t.node), q(i)), n && (W(t.node) && ht(t.node), W(i)) ? (ht(i), t.node.nextSibling) : i
                            }
                        }

                        function lt(t, e, o) {
                            const i = _(e.node, b.eq(t));
                            return i.length ? 1 === i.length ? at(e, o) : i.reduce(function(t, i) {
                                return t === e.node && (t = at(e, o)), at({
                                    node: i,
                                    offset: t ? ot(t) : K(i)
                                }, o)
                            }) : null
                        }

                        function ct(t) {
                            return document.createElement(t)
                        }

                        function ht(t, e) {
                            if (!t || !t.parentNode) return;
                            if (t.removeNode) return t.removeNode(e);
                            const o = t.parentNode;
                            if (!e) {
                                const e = [];
                                for (let o = 0, i = t.childNodes.length; o < i; o++) e.push(t.childNodes[o]);
                                for (let i = 0, n = e.length; i < n; i++) o.insertBefore(e[i], t)
                            }
                            o.removeChild(t)
                        }
                        const dt = I("TEXTAREA");

                        function ut(t, e) {
                            const o = dt(t[0]) ? t.val() : t.html();
                            return e ? o.replace(/[\n\r]/g, "") : o
                        }
                        var pt = {
                            NBSP_CHAR: x,
                            ZERO_WIDTH_NBSP_CHAR: "\ufeff",
                            blank: j,
                            emptyPara: `<p>${j}</p>`,
                            makePredByNodeName: I,
                            isEditable: S,
                            isControlSizing: function(t) {
                                return t && n()(t).hasClass("note-control-sizing")
                            },
                            isText: T,
                            isElement: function(t) {
                                return t && 1 === t.nodeType
                            },
                            isVoid: N,
                            isPara: E,
                            isPurePara: function(t) {
                                return E(t) && !L(t)
                            },
                            isHeading: function(t) {
                                return t && /^H[1-7]/.test(t.nodeName.toUpperCase())
                            },
                            isInline: P,
                            isBlock: b.not(P),
                            isBodyInline: function(t) {
                                return P(t) && !V(t, E)
                            },
                            isBody: U,
                            isParaInline: function(t) {
                                return P(t) && !!V(t, E)
                            },
                            isPre: R,
                            isList: H,
                            isTable: A,
                            isData: F,
                            isCell: B,
                            isBlockquote: z,
                            isBodyContainer: M,
                            isAnchor: O,
                            isDiv: I("DIV"),
                            isLi: L,
                            isBR: I("BR"),
                            isSpan: I("SPAN"),
                            isB: I("B"),
                            isU: I("U"),
                            isS: I("S"),
                            isI: I("I"),
                            isImg: I("IMG"),
                            isTextarea: dt,
                            deepestChildIsEmpty: function(t) {
                                do {
                                    if (null === t.firstElementChild || "" === t.firstElementChild.innerHTML) break
                                } while (t = t.firstElementChild);
                                return W(t)
                            },
                            isEmpty: W,
                            isEmptyAnchor: b.and(O, W),
                            isClosestSibling: function(t, e) {
                                return t.nextSibling === e || t.previousSibling === e
                            },
                            withClosestSiblings: function(t, e) {
                                e = e || b.ok;
                                const o = [];
                                return t.previousSibling && e(t.previousSibling) && o.push(t.previousSibling), o.push(t), t.nextSibling && e(t.nextSibling) && o.push(t.nextSibling), o
                            },
                            nodeLength: K,
                            isLeftEdgePoint: Y,
                            isRightEdgePoint: J,
                            isEdgePoint: X,
                            isLeftEdgeOf: tt,
                            isRightEdgeOf: et,
                            isLeftEdgePointOf: function(t, e) {
                                return Y(t) && tt(t.node, e)
                            },
                            isRightEdgePointOf: function(t, e) {
                                return J(t) && et(t.node, e)
                            },
                            prevPoint: nt,
                            nextPoint: st,
                            isSamePoint: rt,
                            isVisiblePoint: function(t) {
                                if (T(t.node) || !it(t.node) || W(t.node)) return !0;
                                const e = t.node.childNodes[t.offset - 1],
                                    o = t.node.childNodes[t.offset];
                                return !(e && !N(e) || o && !N(o))
                            },
                            prevPointUntil: function(t, e) {
                                for (; t;) {
                                    if (e(t)) return t;
                                    t = nt(t)
                                }
                                return null
                            },
                            nextPointUntil: function(t, e) {
                                for (; t;) {
                                    if (e(t)) return t;
                                    t = st(t)
                                }
                                return null
                            },
                            isCharPoint: function(t) {
                                if (!T(t.node)) return !1;
                                const e = t.node.nodeValue.charAt(t.offset - 1);
                                return e && " " !== e && e !== x
                            },
                            walkPoint: function(t, e, o, i) {
                                let n = t;
                                for (; n && (o(n), !rt(n, e));) n = st(n, i && t.node !== n.node && e.node !== n.node)
                            },
                            ancestor: V,
                            singleChildAncestor: function(t, e) {
                                for (t = t.parentNode; t && 1 === K(t);) {
                                    if (e(t)) return t;
                                    if (S(t)) break;
                                    t = t.parentNode
                                }
                                return null
                            },
                            listAncestor: _,
                            lastAncestor: function(t, e) {
                                const o = _(t);
                                return w.last(o.filter(e))
                            },
                            listNext: G,
                            listPrev: function(t, e) {
                                e = e || b.fail;
                                const o = [];
                                for (; t && !e(t);) o.push(t), t = t.previousSibling;
                                return o
                            },
                            listDescendant: function(t, e) {
                                const o = [];
                                return e = e || b.ok,
                                    function i(n) {
                                        t !== n && e(n) && o.push(n);
                                        for (let t = 0, e = n.childNodes.length; t < e; t++) i(n.childNodes[t])
                                    }(t), o
                            },
                            commonAncestor: function(t, e) {
                                const o = _(t);
                                for (let t = e; t; t = t.parentNode)
                                    if (o.indexOf(t) > -1) return t;
                                return null
                            },
                            wrap: function(t, e) {
                                const o = t.parentNode,
                                    i = n()("<" + e + ">")[0];
                                return o.insertBefore(i, t), i.appendChild(t), i
                            },
                            insertAfter: Z,
                            appendChildNodes: Q,
                            position: ot,
                            hasChildren: it,
                            makeOffsetPath: function(t, e) {
                                return _(e, b.eq(t)).map(ot).reverse()
                            },
                            fromOffsetPath: function(t, e) {
                                let o = t;
                                for (let t = 0, i = e.length; t < i; t++) o = o.childNodes.length <= e[t] ? o.childNodes[o.childNodes.length - 1] : o.childNodes[e[t]];
                                return o
                            },
                            splitTree: lt,
                            splitPoint: function(t, e) {
                                const o = e ? E : M,
                                    i = _(t.node, o),
                                    n = w.last(i) || t.node;
                                let s, r;
                                o(n) ? (s = i[i.length - 2], r = n) : r = (s = n).parentNode;
                                let a = s && lt(s, t, {
                                    isSkipPaddingBlankHTML: e,
                                    isNotSplitEdgePoint: e
                                });
                                return a || r !== t.node || (a = t.node.childNodes[t.offset]), {
                                    rightNode: a,
                                    container: r
                                }
                            },
                            create: ct,
                            createText: function(t) {
                                return document.createTextNode(t)
                            },
                            remove: ht,
                            removeWhile: function(t, e) {
                                for (; t && !S(t) && e(t);) {
                                    const e = t.parentNode;
                                    ht(t), t = e
                                }
                            },
                            replace: function(t, e) {
                                if (t.nodeName.toUpperCase() === e.toUpperCase()) return t;
                                const o = ct(e);
                                return t.style.cssText && (o.style.cssText = t.style.cssText), Q(o, w.from(t.childNodes)), Z(o, t), ht(t), o
                            },
                            html: function(t, e) {
                                let o = ut(t);
                                if (e) {
                                    const t = /<(\/?)(\b(?!!)[^>\s]*)(.*?)(\s*\/?>)/g;
                                    o = (o = o.replace(t, function(t, e, o) {
                                        o = o.toUpperCase();
                                        const i = /^DIV|^TD|^TH|^P|^LI|^H[1-7]/.test(o) && !!e,
                                            n = /^BLOCKQUOTE|^TABLE|^TBODY|^TR|^HR|^UL|^OL/.test(o);
                                        return t + (i || n ? "\n" : "")
                                    })).trim()
                                }
                                return o
                            },
                            value: ut,
                            posFromPlaceholder: function(t) {
                                const e = n()(t),
                                    o = e.offset(),
                                    i = e.outerHeight(!0);
                                return {
                                    left: o.left,
                                    top: o.top + i
                                }
                            },
                            attachEvents: function(t, e) {
                                Object.keys(e).forEach(function(o) {
                                    t.on(o, e[o])
                                })
                            },
                            detachEvents: function(t, e) {
                                Object.keys(e).forEach(function(o) {
                                    t.off(o, e[o])
                                })
                            },
                            isCustomStyleTag: function(t) {
                                return t && !T(t) && w.contains(t.classList, "note-styletag")
                            }
                        };
                        class mt {
                            constructor(t, e) {
                                this.ui = n.a.summernote.ui, this.$note = t, this.memos = {}, this.modules = {}, this.layoutInfo = {}, this.options = e, this.initialize()
                            }
                            initialize() {
                                return this.layoutInfo = this.ui.createLayout(this.$note, this.options), this._initialize(), this.$note.hide(), this
                            }
                            destroy() {
                                this._destroy(), this.$note.removeData("summernote"), this.ui.removeLayout(this.$note, this.layoutInfo)
                            }
                            reset() {
                                const t = this.isDisabled();
                                this.code(pt.emptyPara), this._destroy(), this._initialize(), t && this.disable()
                            }
                            _initialize() {
                                const t = n.a.extend({}, this.options.buttons);
                                Object.keys(t).forEach(e => {
                                    this.memo("button." + e, t[e])
                                });
                                const e = n.a.extend({}, this.options.modules, n.a.summernote.plugins || {});
                                Object.keys(e).forEach(t => {
                                    this.module(t, e[t], !0)
                                }), Object.keys(this.modules).forEach(t => {
                                    this.initializeModule(t)
                                })
                            }
                            _destroy() {
                                Object.keys(this.modules).reverse().forEach(t => {
                                    this.removeModule(t)
                                }), Object.keys(this.memos).forEach(t => {
                                    this.removeMemo(t)
                                }), this.triggerEvent("destroy", this)
                            }
                            code(t) {
                                const e = this.invoke("codeview.isActivated");
                                if (void 0 === t) return this.invoke("codeview.sync"), e ? this.layoutInfo.codable.val() : this.layoutInfo.editable.html();
                                e ? this.layoutInfo.codable.val(t) : this.layoutInfo.editable.html(t), this.$note.val(t), this.triggerEvent("change", t, this.layoutInfo.editable)
                            }
                            isDisabled() {
                                return "false" === this.layoutInfo.editable.attr("contenteditable")
                            }
                            enable() {
                                this.layoutInfo.editable.attr("contenteditable", !0), this.invoke("toolbar.activate", !0), this.triggerEvent("disable", !1)
                            }
                            disable() {
                                this.invoke("codeview.isActivated") && this.invoke("codeview.deactivate"), this.layoutInfo.editable.attr("contenteditable", !1), this.invoke("toolbar.deactivate", !0), this.triggerEvent("disable", !0)
                            }
                            triggerEvent() {
                                const t = w.head(arguments),
                                    e = w.tail(w.from(arguments)),
                                    o = this.options.callbacks[b.namespaceToCamel(t, "on")];
                                o && o.apply(this.$note[0], e), this.$note.trigger("summernote." + t, e)
                            }
                            initializeModule(t) {
                                const e = this.modules[t];
                                e.shouldInitialize = e.shouldInitialize || b.ok, e.shouldInitialize() && (e.initialize && e.initialize(), e.events && pt.attachEvents(this.$note, e.events))
                            }
                            module(t, e, o) {
                                if (1 === arguments.length) return this.modules[t];
                                this.modules[t] = new e(this), o || this.initializeModule(t)
                            }
                            removeModule(t) {
                                const e = this.modules[t];
                                e.shouldInitialize() && (e.events && pt.detachEvents(this.$note, e.events), e.destroy && e.destroy()), delete this.modules[t]
                            }
                            memo(t, e) {
                                if (1 === arguments.length) return this.memos[t];
                                this.memos[t] = e
                            }
                            removeMemo(t) {
                                this.memos[t] && this.memos[t].destroy && this.memos[t].destroy(), delete this.memos[t]
                            }
                            createInvokeHandlerAndUpdateState(t, e) {
                                return o => {
                                    this.createInvokeHandler(t, e)(o), this.invoke("buttons.updateCurrentStyle")
                                }
                            }
                            createInvokeHandler(t, e) {
                                return o => {
                                    o.preventDefault();
                                    const i = n()(o.target);
                                    this.invoke(t, e || i.closest("[data-value]").data("value"), i)
                                }
                            }
                            invoke() {
                                const t = w.head(arguments),
                                    e = w.tail(w.from(arguments)),
                                    o = t.split("."),
                                    i = o.length > 1,
                                    n = i && w.head(o),
                                    s = i ? w.last(o) : w.head(o),
                                    r = this.modules[n || "editor"];
                                return !n && this[s] ? this[s].apply(this, e) : r && r[s] && r.shouldInitialize() ? r[s].apply(r, e) : void 0
                            }
                        }

                        function ft(t, e) {
                            let o, i = t.parentElement();
                            const n = document.body.createTextRange();
                            let s;
                            const r = w.from(i.childNodes);
                            for (o = 0; o < r.length; o++)
                                if (!pt.isText(r[o])) {
                                    if (n.moveToElementText(r[o]), n.compareEndPoints("StartToStart", t) >= 0) break;
                                    s = r[o]
                                } if (0 !== o && pt.isText(r[o - 1])) {
                                const n = document.body.createTextRange();
                                let r = null;
                                n.moveToElementText(s || i), n.collapse(!s), r = s ? s.nextSibling : i.firstChild;
                                const a = t.duplicate();
                                a.setEndPoint("StartToStart", n);
                                let l = a.text.replace(/[\r\n]/g, "").length;
                                for (; l > r.nodeValue.length && r.nextSibling;) l -= r.nodeValue.length, r = r.nextSibling;
                                r.nodeValue;
                                e && r.nextSibling && pt.isText(r.nextSibling) && l === r.nodeValue.length && (l -= r.nodeValue.length, r = r.nextSibling), i = r, o = l
                            }
                            return {
                                cont: i,
                                offset: o
                            }
                        }

                        function gt(t) {
                            const e = function(t, o) {
                                    let i, n;
                                    if (pt.isText(t)) {
                                        const e = pt.listPrev(t, b.not(pt.isText)),
                                            s = w.last(e).previousSibling;
                                        i = s || t.parentNode, o += w.sum(w.tail(e), pt.nodeLength), n = !s
                                    } else {
                                        if (i = t.childNodes[o] || t, pt.isText(i)) return e(i, 0);
                                        o = 0, n = !1
                                    }
                                    return {
                                        node: i,
                                        collapseToStart: n,
                                        offset: o
                                    }
                                },
                                o = document.body.createTextRange(),
                                i = e(t.node, t.offset);
                            return o.moveToElementText(i.node), o.collapse(i.collapseToStart), o.moveStart("character", i.offset), o
                        }
                        n.a.fn.extend({
                            summernote: function() {
                                const t = n.a.type(w.head(arguments)),
                                    e = "string" === t,
                                    o = "object" === t,
                                    i = n.a.extend({}, n.a.summernote.options, o ? w.head(arguments) : {});
                                i.langInfo = n.a.extend(!0, {}, n.a.summernote.lang["en-US"], n.a.summernote.lang[i.lang]), i.icons = n.a.extend(!0, {}, n.a.summernote.options.icons, i.icons), i.tooltip = "auto" === i.tooltip ? !f.isSupportTouch : i.tooltip, this.each((t, e) => {
                                    const o = n()(e);
                                    if (!o.data("summernote")) {
                                        const t = new mt(o, i);
                                        o.data("summernote", t), o.data("summernote").triggerEvent("init", t.layoutInfo)
                                    }
                                });
                                const s = this.first();
                                if (s.length) {
                                    const t = s.data("summernote");
                                    if (e) return t.invoke.apply(t, w.from(arguments));
                                    i.focus && t.invoke("editor.focus")
                                }
                                return this
                            }
                        });
                        class bt {
                            constructor(t, e, o, i) {
                                this.sc = t, this.so = e, this.ec = o, this.eo = i, this.isOnEditable = this.makeIsOn(pt.isEditable), this.isOnList = this.makeIsOn(pt.isList), this.isOnAnchor = this.makeIsOn(pt.isAnchor), this.isOnCell = this.makeIsOn(pt.isCell), this.isOnData = this.makeIsOn(pt.isData)
                            }
                            nativeRange() {
                                if (f.isW3CRangeSupport) {
                                    const t = document.createRange();
                                    return t.setStart(this.sc, this.sc.data && this.so > this.sc.data.length ? 0 : this.so), t.setEnd(this.ec, this.sc.data ? Math.min(this.eo, this.sc.data.length) : this.eo), t
                                } {
                                    const t = gt({
                                        node: this.sc,
                                        offset: this.so
                                    });
                                    return t.setEndPoint("EndToEnd", gt({
                                        node: this.ec,
                                        offset: this.eo
                                    })), t
                                }
                            }
                            getPoints() {
                                return {
                                    sc: this.sc,
                                    so: this.so,
                                    ec: this.ec,
                                    eo: this.eo
                                }
                            }
                            getStartPoint() {
                                return {
                                    node: this.sc,
                                    offset: this.so
                                }
                            }
                            getEndPoint() {
                                return {
                                    node: this.ec,
                                    offset: this.eo
                                }
                            }
                            select() {
                                const t = this.nativeRange();
                                if (f.isW3CRangeSupport) {
                                    const e = document.getSelection();
                                    e.rangeCount > 0 && e.removeAllRanges(), e.addRange(t)
                                } else t.select();
                                return this
                            }
                            scrollIntoView(t) {
                                const e = n()(t).height();
                                return t.scrollTop + e < this.sc.offsetTop && (t.scrollTop += Math.abs(t.scrollTop + e - this.sc.offsetTop)), this
                            }
                            normalize() {
                                const t = function(t, e) {
                                        if (pt.isVisiblePoint(t) && (!pt.isEdgePoint(t) || pt.isRightEdgePoint(t) && !e || pt.isLeftEdgePoint(t) && e || pt.isRightEdgePoint(t) && e && pt.isVoid(t.node.nextSibling) || pt.isLeftEdgePoint(t) && !e && pt.isVoid(t.node.previousSibling) || pt.isBlock(t.node) && pt.isEmpty(t.node))) return t;
                                        const o = pt.ancestor(t.node, pt.isBlock);
                                        if ((pt.isLeftEdgePointOf(t, o) || pt.isVoid(pt.prevPoint(t).node)) && !e || (pt.isRightEdgePointOf(t, o) || pt.isVoid(pt.nextPoint(t).node)) && e) {
                                            if (pt.isVisiblePoint(t)) return t;
                                            e = !e
                                        }
                                        return (e ? pt.nextPointUntil(pt.nextPoint(t), pt.isVisiblePoint) : pt.prevPointUntil(pt.prevPoint(t), pt.isVisiblePoint)) || t
                                    },
                                    e = t(this.getEndPoint(), !1),
                                    o = this.isCollapsed() ? e : t(this.getStartPoint(), !0);
                                return new bt(o.node, o.offset, e.node, e.offset)
                            }
                            nodes(t, e) {
                                t = t || b.ok;
                                const o = e && e.includeAncestor,
                                    i = e && e.fullyContains,
                                    n = this.getStartPoint(),
                                    s = this.getEndPoint(),
                                    r = [],
                                    a = [];
                                return pt.walkPoint(n, s, function(e) {
                                    if (pt.isEditable(e.node)) return;
                                    let n;
                                    i ? (pt.isLeftEdgePoint(e) && a.push(e.node), pt.isRightEdgePoint(e) && w.contains(a, e.node) && (n = e.node)) : n = o ? pt.ancestor(e.node, t) : e.node, n && t(n) && r.push(n)
                                }, !0), w.unique(r)
                            }
                            commonAncestor() {
                                return pt.commonAncestor(this.sc, this.ec)
                            }
                            expand(t) {
                                const e = pt.ancestor(this.sc, t),
                                    o = pt.ancestor(this.ec, t);
                                if (!e && !o) return new bt(this.sc, this.so, this.ec, this.eo);
                                const i = this.getPoints();
                                return e && (i.sc = e, i.so = 0), o && (i.ec = o, i.eo = pt.nodeLength(o)), new bt(i.sc, i.so, i.ec, i.eo)
                            }
                            collapse(t) {
                                return t ? new bt(this.sc, this.so, this.sc, this.so) : new bt(this.ec, this.eo, this.ec, this.eo)
                            }
                            splitText() {
                                const t = this.sc === this.ec,
                                    e = this.getPoints();
                                return pt.isText(this.ec) && !pt.isEdgePoint(this.getEndPoint()) && this.ec.splitText(this.eo), pt.isText(this.sc) && !pt.isEdgePoint(this.getStartPoint()) && (e.sc = this.sc.splitText(this.so), e.so = 0, t && (e.ec = e.sc, e.eo = this.eo - this.so)), new bt(e.sc, e.so, e.ec, e.eo)
                            }
                            deleteContents() {
                                if (this.isCollapsed()) return this;
                                const t = this.splitText(),
                                    e = t.nodes(null, {
                                        fullyContains: !0
                                    }),
                                    o = pt.prevPointUntil(t.getStartPoint(), function(t) {
                                        return !w.contains(e, t.node)
                                    }),
                                    i = [];
                                return n.a.each(e, function(t, e) {
                                    const n = e.parentNode;
                                    o.node !== n && 1 === pt.nodeLength(n) && i.push(n), pt.remove(e, !1)
                                }), n.a.each(i, function(t, e) {
                                    pt.remove(e, !1)
                                }), new bt(o.node, o.offset, o.node, o.offset).normalize()
                            }
                            makeIsOn(t) {
                                return function() {
                                    const e = pt.ancestor(this.sc, t);
                                    return !!e && e === pt.ancestor(this.ec, t)
                                }
                            }
                            isLeftEdgeOf(t) {
                                if (!pt.isLeftEdgePoint(this.getStartPoint())) return !1;
                                const e = pt.ancestor(this.sc, t);
                                return e && pt.isLeftEdgeOf(this.sc, e)
                            }
                            isCollapsed() {
                                return this.sc === this.ec && this.so === this.eo
                            }
                            wrapBodyInlineWithPara() {
                                if (pt.isBodyContainer(this.sc) && pt.isEmpty(this.sc)) return this.sc.innerHTML = pt.emptyPara, new bt(this.sc.firstChild, 0, this.sc.firstChild, 0);
                                const t = this.normalize();
                                if (pt.isParaInline(this.sc) || pt.isPara(this.sc)) return t;
                                let e;
                                if (pt.isInline(t.sc)) {
                                    const o = pt.listAncestor(t.sc, b.not(pt.isInline));
                                    e = w.last(o), pt.isInline(e) || (e = o[o.length - 2] || t.sc.childNodes[t.so])
                                } else e = t.sc.childNodes[t.so > 0 ? t.so - 1 : 0];
                                let o = pt.listPrev(e, pt.isParaInline).reverse();
                                if ((o = o.concat(pt.listNext(e.nextSibling, pt.isParaInline))).length) {
                                    const t = pt.wrap(w.head(o), "p");
                                    pt.appendChildNodes(t, w.tail(o))
                                }
                                return this.normalize()
                            }
                            insertNode(t) {
                                const e = this.wrapBodyInlineWithPara().deleteContents(),
                                    o = pt.splitPoint(e.getStartPoint(), pt.isInline(t));
                                return o.rightNode ? o.rightNode.parentNode.insertBefore(t, o.rightNode) : o.container.appendChild(t), t
                            }
                            pasteHTML(t) {
                                const e = n()("<div></div>").html(t)[0];
                                let o = w.from(e.childNodes);
                                const i = this.wrapBodyInlineWithPara().deleteContents();
                                return i.so > 0 && (o = o.reverse()), o = o.map(function(t) {
                                    return i.insertNode(t)
                                }), i.so > 0 && (o = o.reverse()), o
                            }
                            toString() {
                                const t = this.nativeRange();
                                return f.isW3CRangeSupport ? t.toString() : t.text
                            }
                            getWordRange(t) {
                                let e = this.getEndPoint();
                                if (!pt.isCharPoint(e)) return this;
                                const o = pt.prevPointUntil(e, function(t) {
                                    return !pt.isCharPoint(t)
                                });
                                return t && (e = pt.nextPointUntil(e, function(t) {
                                    return !pt.isCharPoint(t)
                                })), new bt(o.node, o.offset, e.node, e.offset)
                            }
                            bookmark(t) {
                                return {
                                    s: {
                                        path: pt.makeOffsetPath(t, this.sc),
                                        offset: this.so
                                    },
                                    e: {
                                        path: pt.makeOffsetPath(t, this.ec),
                                        offset: this.eo
                                    }
                                }
                            }
                            paraBookmark(t) {
                                return {
                                    s: {
                                        path: w.tail(pt.makeOffsetPath(w.head(t), this.sc)),
                                        offset: this.so
                                    },
                                    e: {
                                        path: w.tail(pt.makeOffsetPath(w.last(t), this.ec)),
                                        offset: this.eo
                                    }
                                }
                            }
                            getClientRects() {
                                return this.nativeRange().getClientRects()
                            }
                        }
                        var vt = {
                            create: function(t, e, o, i) {
                                if (4 === arguments.length) return new bt(t, e, o, i);
                                if (2 === arguments.length) return new bt(t, e, o = t, i = e); {
                                    let t = this.createFromSelection();
                                    return t || 1 !== arguments.length ? t : (t = this.createFromNode(arguments[0])).collapse(pt.emptyPara === arguments[0].innerHTML)
                                }
                            },
                            createFromSelection: function() {
                                let t, e, o, i;
                                if (f.isW3CRangeSupport) {
                                    const n = document.getSelection();
                                    if (!n || 0 === n.rangeCount) return null;
                                    if (pt.isBody(n.anchorNode)) return null;
                                    const s = n.getRangeAt(0);
                                    t = s.startContainer, e = s.startOffset, o = s.endContainer, i = s.endOffset
                                } else {
                                    const n = document.selection.createRange(),
                                        s = n.duplicate();
                                    s.collapse(!1);
                                    const r = n;
                                    r.collapse(!0);
                                    let a = ft(r, !0),
                                        l = ft(s, !1);
                                    pt.isText(a.node) && pt.isLeftEdgePoint(a) && pt.isTextNode(l.node) && pt.isRightEdgePoint(l) && l.node.nextSibling === a.node && (a = l), t = a.cont, e = a.offset, o = l.cont, i = l.offset
                                }
                                return new bt(t, e, o, i)
                            },
                            createFromNode: function(t) {
                                let e = t,
                                    o = 0,
                                    i = t,
                                    n = pt.nodeLength(i);
                                return pt.isVoid(e) && (o = pt.listPrev(e).length - 1, e = e.parentNode), pt.isBR(i) ? (n = pt.listPrev(i).length - 1, i = i.parentNode) : pt.isVoid(i) && (n = pt.listPrev(i).length, i = i.parentNode), this.create(e, o, i, n)
                            },
                            createFromNodeBefore: function(t) {
                                return this.createFromNode(t).collapse(!0)
                            },
                            createFromNodeAfter: function(t) {
                                return this.createFromNode(t).collapse()
                            },
                            createFromBookmark: function(t, e) {
                                const o = pt.fromOffsetPath(t, e.s.path),
                                    i = e.s.offset,
                                    n = pt.fromOffsetPath(t, e.e.path),
                                    s = e.e.offset;
                                return new bt(o, i, n, s)
                            },
                            createFromParaBookmark: function(t, e) {
                                const o = t.s.offset,
                                    i = t.e.offset,
                                    n = pt.fromOffsetPath(w.head(e), t.s.path),
                                    s = pt.fromOffsetPath(w.last(e), t.e.path);
                                return new bt(n, o, s, i)
                            }
                        };
                        const kt = {
                            BACKSPACE: 8,
                            TAB: 9,
                            ENTER: 13,
                            SPACE: 32,
                            DELETE: 46,
                            LEFT: 37,
                            UP: 38,
                            RIGHT: 39,
                            DOWN: 40,
                            NUM0: 48,
                            NUM1: 49,
                            NUM2: 50,
                            NUM3: 51,
                            NUM4: 52,
                            NUM5: 53,
                            NUM6: 54,
                            NUM7: 55,
                            NUM8: 56,
                            B: 66,
                            E: 69,
                            I: 73,
                            J: 74,
                            K: 75,
                            L: 76,
                            R: 82,
                            S: 83,
                            U: 85,
                            V: 86,
                            Y: 89,
                            Z: 90,
                            SLASH: 191,
                            LEFTBRACKET: 219,
                            BACKSLASH: 220,
                            RIGHTBRACKET: 221
                        };
                        var Ct = {
                            isEdit: t => w.contains([kt.BACKSPACE, kt.TAB, kt.ENTER, kt.SPACE, kt.DELETE], t),
                            isMove: t => w.contains([kt.LEFT, kt.UP, kt.RIGHT, kt.DOWN], t),
                            nameFromCode: b.invertObject(kt),
                            code: kt
                        };
                        class yt {
                            constructor(t) {
                                this.stack = [], this.stackOffset = -1, this.$editable = t, this.editable = t[0]
                            }
                            makeSnapshot() {
                                const t = vt.create(this.editable);
                                return {
                                    contents: this.$editable.html(),
                                    bookmark: t && t.isOnEditable() ? t.bookmark(this.editable) : {
                                        s: {
                                            path: [],
                                            offset: 0
                                        },
                                        e: {
                                            path: [],
                                            offset: 0
                                        }
                                    }
                                }
                            }
                            applySnapshot(t) {
                                null !== t.contents && this.$editable.html(t.contents), null !== t.bookmark && vt.createFromBookmark(this.editable, t.bookmark).select()
                            }
                            rewind() {
                                this.$editable.html() !== this.stack[this.stackOffset].contents && this.recordUndo(), this.stackOffset = 0, this.applySnapshot(this.stack[this.stackOffset])
                            }
                            commit() {
                                this.stack = [], this.stackOffset = -1, this.recordUndo()
                            }
                            reset() {
                                this.stack = [], this.stackOffset = -1, this.$editable.html(""), this.recordUndo()
                            }
                            undo() {
                                this.$editable.html() !== this.stack[this.stackOffset].contents && this.recordUndo(), this.stackOffset > 0 && (this.stackOffset--, this.applySnapshot(this.stack[this.stackOffset]))
                            }
                            redo() {
                                this.stack.length - 1 > this.stackOffset && (this.stackOffset++, this.applySnapshot(this.stack[this.stackOffset]))
                            }
                            recordUndo() {
                                this.stackOffset++, this.stack.length > this.stackOffset && (this.stack = this.stack.slice(0, this.stackOffset)), this.stack.push(this.makeSnapshot())
                            }
                        }
                        class wt {
                            jQueryCSS(t, e) {
                                if (f.jqueryVersion < 1.9) {
                                    const o = {};
                                    return n.a.each(e, (e, i) => {
                                        o[i] = t.css(i)
                                    }), o
                                }
                                return t.css(e)
                            }
                            fromNode(t) {
                                const e = this.jQueryCSS(t, ["font-family", "font-size", "text-align", "list-style-type", "line-height"]) || {};
                                return e["font-size"] = parseInt(e["font-size"], 10), e
                            }
                            stylePara(t, e) {
                                n.a.each(t.nodes(pt.isPara, {
                                    includeAncestor: !0
                                }), (t, o) => {
                                    n()(o).css(e)
                                })
                            }
                            styleNodes(t, e) {
                                t = t.splitText();
                                const o = e && e.nodeName || "SPAN",
                                    i = !(!e || !e.expandClosestSibling),
                                    s = !(!e || !e.onlyPartialContains);
                                if (t.isCollapsed()) return [t.insertNode(pt.create(o))];
                                let r = pt.makePredByNodeName(o);
                                const a = t.nodes(pt.isText, {
                                    fullyContains: !0
                                }).map(t => pt.singleChildAncestor(t, r) || pt.wrap(t, o));
                                if (i) {
                                    if (s) {
                                        const e = t.nodes();
                                        r = b.and(r, t => w.contains(e, t))
                                    }
                                    return a.map(t => {
                                        const e = pt.withClosestSiblings(t, r),
                                            o = w.head(e),
                                            i = w.tail(e);
                                        return n.a.each(i, (t, e) => {
                                            pt.appendChildNodes(o, e.childNodes), pt.remove(e)
                                        }), w.head(e)
                                    })
                                }
                                return a
                            }
                            current(t) {
                                const e = n()(pt.isElement(t.sc) ? t.sc : t.sc.parentNode);
                                let o = this.fromNode(e);
                                try {
                                    o = n.a.extend(o, {
                                        "font-bold": document.queryCommandState("bold") ? "bold" : "normal",
                                        "font-italic": document.queryCommandState("italic") ? "italic" : "normal",
                                        "font-underline": document.queryCommandState("underline") ? "underline" : "normal",
                                        "font-subscript": document.queryCommandState("subscript") ? "subscript" : "normal",
                                        "font-superscript": document.queryCommandState("superscript") ? "superscript" : "normal",
                                        "font-strikethrough": document.queryCommandState("strikethrough") ? "strikethrough" : "normal",
                                        "font-family": document.queryCommandValue("fontname") || o["font-family"]
                                    })
                                } catch (t) {}
                                if (t.isOnList()) {
                                    const t = ["circle", "disc", "disc-leading-zero", "square"].indexOf(o["list-style-type"]) > -1;
                                    o["list-style"] = t ? "unordered" : "ordered"
                                } else o["list-style"] = "none";
                                const i = pt.ancestor(t.sc, pt.isPara);
                                if (i && i.style["line-height"]) o["line-height"] = i.style.lineHeight;
                                else {
                                    const t = parseInt(o["line-height"], 10) / parseInt(o["font-size"], 10);
                                    o["line-height"] = t.toFixed(1)
                                }
                                return o.anchor = t.isOnAnchor() && pt.ancestor(t.sc, pt.isAnchor), o.ancestors = pt.listAncestor(t.sc, pt.isEditable), o.range = t, o
                            }
                        }
                        class xt {
                            insertOrderedList(t) {
                                this.toggleList("OL", t)
                            }
                            insertUnorderedList(t) {
                                this.toggleList("UL", t)
                            }
                            indent(t) {
                                const e = vt.create(t).wrapBodyInlineWithPara(),
                                    o = e.nodes(pt.isPara, {
                                        includeAncestor: !0
                                    }),
                                    i = w.clusterBy(o, b.peq2("parentNode"));
                                n.a.each(i, (t, e) => {
                                    const o = w.head(e);
                                    if (pt.isLi(o)) {
                                        const t = this.findList(o.previousSibling);
                                        t ? e.map(e => t.appendChild(e)) : (this.wrapList(e, o.parentNode.nodeName), e.map(t => t.parentNode).map(t => this.appendToPrevious(t)))
                                    } else n.a.each(e, (t, e) => {
                                        n()(e).css("marginLeft", (t, e) => (parseInt(e, 10) || 0) + 25)
                                    })
                                }), e.select()
                            }
                            outdent(t) {
                                const e = vt.create(t).wrapBodyInlineWithPara(),
                                    o = e.nodes(pt.isPara, {
                                        includeAncestor: !0
                                    }),
                                    i = w.clusterBy(o, b.peq2("parentNode"));
                                n.a.each(i, (t, e) => {
                                    const o = w.head(e);
                                    pt.isLi(o) ? this.releaseList([e]) : n.a.each(e, (t, e) => {
                                        n()(e).css("marginLeft", (t, e) => (e = parseInt(e, 10) || 0) > 25 ? e - 25 : "")
                                    })
                                }), e.select()
                            }
                            toggleList(t, e) {
                                const o = vt.create(e).wrapBodyInlineWithPara();
                                let i = o.nodes(pt.isPara, {
                                    includeAncestor: !0
                                });
                                const s = o.paraBookmark(i),
                                    r = w.clusterBy(i, b.peq2("parentNode"));
                                if (w.find(i, pt.isPurePara)) {
                                    let e = [];
                                    n.a.each(r, (o, i) => {
                                        e = e.concat(this.wrapList(i, t))
                                    }), i = e
                                } else {
                                    const e = o.nodes(pt.isList, {
                                        includeAncestor: !0
                                    }).filter(e => !n.a.nodeName(e, t));
                                    e.length ? n.a.each(e, (e, o) => {
                                        pt.replace(o, t)
                                    }) : i = this.releaseList(r, !0)
                                }
                                vt.createFromParaBookmark(s, i).select()
                            }
                            wrapList(t, e) {
                                const o = w.head(t),
                                    i = w.last(t),
                                    n = pt.isList(o.previousSibling) && o.previousSibling,
                                    s = pt.isList(i.nextSibling) && i.nextSibling,
                                    r = n || pt.insertAfter(pt.create(e || "UL"), i);
                                return t = t.map(t => pt.isPurePara(t) ? pt.replace(t, "LI") : t), pt.appendChildNodes(r, t), s && (pt.appendChildNodes(r, w.from(s.childNodes)), pt.remove(s)), t
                            }
                            releaseList(t, e) {
                                let o = [];
                                return n.a.each(t, (t, i) => {
                                    const s = w.head(i),
                                        r = w.last(i),
                                        a = e ? pt.lastAncestor(s, pt.isList) : s.parentNode,
                                        l = a.parentNode;
                                    if ("LI" === a.parentNode.nodeName) i.map(t => {
                                        const e = this.findNextSiblings(t);
                                        l.nextSibling ? l.parentNode.insertBefore(t, l.nextSibling) : l.parentNode.appendChild(t), e.length && (this.wrapList(e, a.nodeName), t.appendChild(e[0].parentNode))
                                    }), 0 === a.children.length && l.removeChild(a), 0 === l.childNodes.length && l.parentNode.removeChild(l);
                                    else {
                                        const t = a.childNodes.length > 1 ? pt.splitTree(a, {
                                                node: r.parentNode,
                                                offset: pt.position(r) + 1
                                            }, {
                                                isSkipPaddingBlankHTML: !0
                                            }) : null,
                                            o = pt.splitTree(a, {
                                                node: s.parentNode,
                                                offset: pt.position(s)
                                            }, {
                                                isSkipPaddingBlankHTML: !0
                                            });
                                        i = e ? pt.listDescendant(o, pt.isLi) : w.from(o.childNodes).filter(pt.isLi), !e && pt.isList(a.parentNode) || (i = i.map(t => pt.replace(t, "P"))), n.a.each(w.from(i).reverse(), (t, e) => {
                                            pt.insertAfter(e, a)
                                        });
                                        const l = w.compact([a, o, t]);
                                        n.a.each(l, (t, e) => {
                                            const o = [e].concat(pt.listDescendant(e, pt.isList));
                                            n.a.each(o.reverse(), (t, e) => {
                                                pt.nodeLength(e) || pt.remove(e, !0)
                                            })
                                        })
                                    }
                                    o = o.concat(i)
                                }), o
                            }
                            appendToPrevious(t) {
                                return t.previousSibling ? pt.appendChildNodes(t.previousSibling, [t]) : this.wrapList([t], "LI")
                            }
                            findList(t) {
                                return t ? w.find(t.children, t => ["OL", "UL"].indexOf(t.nodeName) > -1) : null
                            }
                            findNextSiblings(t) {
                                const e = [];
                                for (; t.nextSibling;) e.push(t.nextSibling), t = t.nextSibling;
                                return e
                            }
                        }
                        class St {
                            constructor(t) {
                                this.bullet = new xt, this.options = t.options
                            }
                            insertTab(t, e) {
                                const o = pt.createText(new Array(e + 1).join(pt.NBSP_CHAR));
                                (t = t.deleteContents()).insertNode(o, !0), (t = vt.create(o, e)).select()
                            }
                            insertParagraph(t, e) {
                                e = (e = (e = e || vt.create(t)).deleteContents()).wrapBodyInlineWithPara();
                                const o = pt.ancestor(e.sc, pt.isPara);
                                let i;
                                if (o) {
                                    if (pt.isLi(o) && (pt.isEmpty(o) || pt.deepestChildIsEmpty(o))) return void this.bullet.toggleList(o.parentNode.nodeName); {
                                        let t = null;
                                        if (1 === this.options.blockquoteBreakingLevel ? t = pt.ancestor(o, pt.isBlockquote) : 2 === this.options.blockquoteBreakingLevel && (t = pt.lastAncestor(o, pt.isBlockquote)), t) {
                                            i = n()(pt.emptyPara)[0], pt.isRightEdgePoint(e.getStartPoint()) && pt.isBR(e.sc.nextSibling) && n()(e.sc.nextSibling).remove();
                                            const o = pt.splitTree(t, e.getStartPoint(), {
                                                isDiscardEmptySplits: !0
                                            });
                                            o ? o.parentNode.insertBefore(i, o) : pt.insertAfter(i, t)
                                        } else {
                                            i = pt.splitTree(o, e.getStartPoint());
                                            let t = pt.listDescendant(o, pt.isEmptyAnchor);
                                            t = t.concat(pt.listDescendant(i, pt.isEmptyAnchor)), n.a.each(t, (t, e) => {
                                                pt.remove(e)
                                            }), (pt.isHeading(i) || pt.isPre(i) || pt.isCustomStyleTag(i)) && pt.isEmpty(i) && (i = pt.replace(i, "p"))
                                        }
                                    }
                                } else {
                                    const t = e.sc.childNodes[e.so];
                                    i = n()(pt.emptyPara)[0], t ? e.sc.insertBefore(i, t) : e.sc.appendChild(i)
                                }
                                vt.create(i, 0).normalize().select().scrollIntoView(t)
                            }
                        }
                        const It = function(t, e, o, i) {
                            const n = {
                                    colPos: 0,
                                    rowPos: 0
                                },
                                s = [],
                                r = [];

                            function a(t, e, o, i, n, r, a) {
                                const l = {
                                    baseRow: o,
                                    baseCell: i,
                                    isRowSpan: n,
                                    isColSpan: r,
                                    isVirtual: a
                                };
                                s[t] || (s[t] = []), s[t][e] = l
                            }

                            function l(t, e, o, i) {
                                return {
                                    baseCell: t.baseCell,
                                    action: e,
                                    virtualTable: {
                                        rowIndex: o,
                                        cellIndex: i
                                    }
                                }
                            }

                            function c(t, e) {
                                if (!s[t]) return e;
                                if (!s[t][e]) return e;
                                let o = e;
                                for (; s[t][o];)
                                    if (o++, !s[t][o]) return o
                            }

                            function h(t, e) {
                                const o = c(t.rowIndex, e.cellIndex),
                                    i = e.colSpan > 1,
                                    s = e.rowSpan > 1,
                                    r = t.rowIndex === n.rowPos && e.cellIndex === n.colPos;
                                a(t.rowIndex, o, t, e, s, i, !1);
                                const l = e.attributes.rowSpan ? parseInt(e.attributes.rowSpan.value, 10) : 0;
                                if (l > 1)
                                    for (let n = 1; n < l; n++) {
                                        const s = t.rowIndex + n;
                                        d(s, o, e, r), a(s, o, t, e, !0, i, !0)
                                    }
                                const h = e.attributes.colSpan ? parseInt(e.attributes.colSpan.value, 10) : 0;
                                if (h > 1)
                                    for (let i = 1; i < h; i++) {
                                        const n = c(t.rowIndex, o + i);
                                        d(t.rowIndex, n, e, r), a(t.rowIndex, n, t, e, s, !0, !0)
                                    }
                            }

                            function d(t, e, o, i) {
                                t === n.rowPos && n.colPos >= o.cellIndex && o.cellIndex <= e && !i && n.colPos++
                            }

                            function u(t) {
                                switch (e) {
                                    case It.where.Column:
                                        if (t.isColSpan) return It.resultAction.SubtractSpanCount;
                                        break;
                                    case It.where.Row:
                                        if (!t.isVirtual && t.isRowSpan) return It.resultAction.AddCell;
                                        if (t.isRowSpan) return It.resultAction.SubtractSpanCount
                                }
                                return It.resultAction.RemoveCell
                            }

                            function p(t) {
                                switch (e) {
                                    case It.where.Column:
                                        if (t.isColSpan) return It.resultAction.SumSpanCount;
                                        if (t.isRowSpan && t.isVirtual) return It.resultAction.Ignore;
                                        break;
                                    case It.where.Row:
                                        if (t.isRowSpan) return It.resultAction.SumSpanCount;
                                        if (t.isColSpan && t.isVirtual) return It.resultAction.Ignore
                                }
                                return It.resultAction.AddCell
                            }
                            this.getActionList = function() {
                                    const t = e === It.where.Row ? n.rowPos : -1,
                                        i = e === It.where.Column ? n.colPos : -1;
                                    let a = 0,
                                        c = !0;
                                    for (; c;) {
                                        const e = t >= 0 ? t : a,
                                            n = i >= 0 ? i : a,
                                            h = s[e];
                                        if (!h) return c = !1, r;
                                        const d = h[n];
                                        if (!d) return c = !1, r;
                                        let m = It.resultAction.Ignore;
                                        switch (o) {
                                            case It.requestAction.Add:
                                                m = p(d);
                                                break;
                                            case It.requestAction.Delete:
                                                m = u(d)
                                        }
                                        r.push(l(d, m, e, n)), a++
                                    }
                                    return r
                                }, t && t.tagName && ("td" === t.tagName.toLowerCase() || "th" === t.tagName.toLowerCase()) ? (n.colPos = t.cellIndex, t.parentElement && t.parentElement.tagName && "tr" === t.parentElement.tagName.toLowerCase() ? n.rowPos = t.parentElement.rowIndex : console.error("Impossible to identify start Row point.", t)) : console.error("Impossible to identify start Cell point.", t),
                                function() {
                                    const t = i.rows;
                                    for (let e = 0; e < t.length; e++) {
                                        const o = t[e].cells;
                                        for (let i = 0; i < o.length; i++) h(t[e], o[i])
                                    }
                                }()
                        };
                        It.where = {
                            Row: 0,
                            Column: 1
                        }, It.requestAction = {
                            Add: 0,
                            Delete: 1
                        }, It.resultAction = {
                            Ignore: 0,
                            SubtractSpanCount: 1,
                            RemoveCell: 2,
                            AddCell: 3,
                            SumSpanCount: 4
                        };
                        class $t {
                            tab(t, e) {
                                const o = pt.ancestor(t.commonAncestor(), pt.isCell),
                                    i = pt.ancestor(o, pt.isTable),
                                    n = pt.listDescendant(i, pt.isCell),
                                    s = w[e ? "prev" : "next"](n, o);
                                s && vt.create(s, 0).select()
                            }
                            addRow(t, e) {
                                const o = pt.ancestor(t.commonAncestor(), pt.isCell),
                                    i = n()(o).closest("tr"),
                                    s = this.recoverAttributes(i),
                                    r = n()("<tr" + s + "></tr>"),
                                    a = new It(o, It.where.Row, It.requestAction.Add, n()(i).closest("table")[0]).getActionList();
                                for (let t = 0; t < a.length; t++) {
                                    const o = a[t],
                                        s = this.recoverAttributes(o.baseCell);
                                    switch (o.action) {
                                        case It.resultAction.AddCell:
                                            r.append("<td" + s + ">" + pt.blank + "</td>");
                                            break;
                                        case It.resultAction.SumSpanCount:
                                            if ("top" === e) {
                                                if ((o.baseCell.parent ? o.baseCell.closest("tr").rowIndex : 0) <= i[0].rowIndex) {
                                                    const t = n()("<div></div>").append(n()("<td" + s + ">" + pt.blank + "</td>").removeAttr("rowspan")).html();
                                                    r.append(t);
                                                    break
                                                }
                                            }
                                            let t = parseInt(o.baseCell.rowSpan, 10);
                                            t++, o.baseCell.setAttribute("rowSpan", t)
                                    }
                                }
                                if ("top" === e) i.before(r);
                                else {
                                    if (o.rowSpan > 1) {
                                        const t = i[0].rowIndex + (o.rowSpan - 2);
                                        return void n()(n()(i).parent().find("tr")[t]).after(n()(r))
                                    }
                                    i.after(r)
                                }
                            }
                            addCol(t, e) {
                                const o = pt.ancestor(t.commonAncestor(), pt.isCell),
                                    i = n()(o).closest("tr");
                                n()(i).siblings().push(i);
                                const s = new It(o, It.where.Column, It.requestAction.Add, n()(i).closest("table")[0]).getActionList();
                                for (let t = 0; t < s.length; t++) {
                                    const o = s[t],
                                        i = this.recoverAttributes(o.baseCell);
                                    switch (o.action) {
                                        case It.resultAction.AddCell:
                                            "right" === e ? n()(o.baseCell).after("<td" + i + ">" + pt.blank + "</td>") : n()(o.baseCell).before("<td" + i + ">" + pt.blank + "</td>");
                                            break;
                                        case It.resultAction.SumSpanCount:
                                            if ("right" === e) {
                                                let t = parseInt(o.baseCell.colSpan, 10);
                                                t++, o.baseCell.setAttribute("colSpan", t)
                                            } else n()(o.baseCell).before("<td" + i + ">" + pt.blank + "</td>")
                                    }
                                }
                            }
                            recoverAttributes(t) {
                                let e = "";
                                if (!t) return e;
                                const o = t.attributes || [];
                                for (let t = 0; t < o.length; t++) "id" !== o[t].name.toLowerCase() && o[t].specified && (e += " " + o[t].name + "='" + o[t].value + "'");
                                return e
                            }
                            deleteRow(t) {
                                const e = pt.ancestor(t.commonAncestor(), pt.isCell),
                                    o = n()(e).closest("tr"),
                                    i = o.children("td, th").index(n()(e)),
                                    s = o[0].rowIndex,
                                    r = new It(e, It.where.Row, It.requestAction.Delete, n()(o).closest("table")[0]).getActionList();
                                for (let t = 0; t < r.length; t++) {
                                    if (!r[t]) continue;
                                    const e = r[t].baseCell,
                                        n = r[t].virtualTable,
                                        a = e.rowSpan && e.rowSpan > 1;
                                    let l = a ? parseInt(e.rowSpan, 10) : 0;
                                    switch (r[t].action) {
                                        case It.resultAction.Ignore:
                                            continue;
                                        case It.resultAction.AddCell:
                                            const c = o.next("tr")[0];
                                            if (!c) continue;
                                            const h = o[0].cells[i];
                                            a && (l > 2 ? (l--, c.insertBefore(h, c.cells[i]), c.cells[i].setAttribute("rowSpan", l), c.cells[i].innerHTML = "") : 2 === l && (c.insertBefore(h, c.cells[i]), c.cells[i].removeAttribute("rowSpan"), c.cells[i].innerHTML = ""));
                                            continue;
                                        case It.resultAction.SubtractSpanCount:
                                            a && (l > 2 ? (l--, e.setAttribute("rowSpan", l), n.rowIndex !== s && e.cellIndex === i && (e.innerHTML = "")) : 2 === l && (e.removeAttribute("rowSpan"), n.rowIndex !== s && e.cellIndex === i && (e.innerHTML = "")));
                                            continue;
                                        case It.resultAction.RemoveCell:
                                            continue
                                    }
                                }
                                o.remove()
                            }
                            deleteCol(t) {
                                const e = pt.ancestor(t.commonAncestor(), pt.isCell),
                                    o = n()(e).closest("tr"),
                                    i = o.children("td, th").index(n()(e)),
                                    s = new It(e, It.where.Column, It.requestAction.Delete, n()(o).closest("table")[0]).getActionList();
                                for (let t = 0; t < s.length; t++)
                                    if (s[t]) switch (s[t].action) {
                                        case It.resultAction.Ignore:
                                            continue;
                                        case It.resultAction.SubtractSpanCount:
                                            const e = s[t].baseCell;
                                            if (e.colSpan && e.colSpan > 1) {
                                                let t = e.colSpan ? parseInt(e.colSpan, 10) : 0;
                                                t > 2 ? (t--, e.setAttribute("colSpan", t), e.cellIndex === i && (e.innerHTML = "")) : 2 === t && (e.removeAttribute("colSpan"), e.cellIndex === i && (e.innerHTML = ""))
                                            }
                                            continue;
                                        case It.resultAction.RemoveCell:
                                            pt.remove(s[t].baseCell, !0);
                                            continue
                                    }
                            }
                            createTable(t, e, o) {
                                const i = [];
                                let s;
                                for (let e = 0; e < t; e++) i.push("<td>" + pt.blank + "</td>");
                                s = i.join("");
                                const r = [];
                                let a;
                                for (let t = 0; t < e; t++) r.push("<tr>" + s + "</tr>");
                                a = r.join("");
                                const l = n()("<table>" + a + "</table>");
                                return o && o.tableClassName && l.addClass(o.tableClassName), l[0]
                            }
                            deleteTable(t) {
                                const e = pt.ancestor(t.commonAncestor(), pt.isCell);
                                n()(e).closest("table").remove()
                            }
                        }
                        const Tt = "bogus";
                        let Nt;
                        f.hasCodeMirror && (Nt = window.CodeMirror);
                        const Et = 24;
                        const Rt = "http://",
                            Lt = /^([A-Za-z][A-Za-z0-9+-.]*\:[\/]{2}|mailto:[A-Z0-9._%+-]+@)?(www\.)?(.+)$/i;
                        const At = 20;
                        const Ft = 5;
                        n.a.summernote = n.a.extend(n.a.summernote, {
                            version: "0.8.12",
                            plugins: {},
                            dom: pt,
                            range: vt,
                            lists: w,
                            options: {
                                langInfo: n.a.summernote.lang["en-US"],
                                modules: {
                                    editor: class {
                                        constructor(t) {
                                            this.context = t, this.$note = t.layoutInfo.note, this.$editor = t.layoutInfo.editor, this.$editable = t.layoutInfo.editable, this.options = t.options, this.lang = this.options.langInfo, this.editable = this.$editable[0], this.lastRange = null, this.style = new wt, this.table = new $t, this.typing = new St(t), this.bullet = new xt, this.history = new yt(this.$editable), this.context.memo("help.undo", this.lang.help.undo), this.context.memo("help.redo", this.lang.help.redo), this.context.memo("help.tab", this.lang.help.tab), this.context.memo("help.untab", this.lang.help.untab), this.context.memo("help.insertParagraph", this.lang.help.insertParagraph), this.context.memo("help.insertOrderedList", this.lang.help.insertOrderedList), this.context.memo("help.insertUnorderedList", this.lang.help.insertUnorderedList), this.context.memo("help.indent", this.lang.help.indent), this.context.memo("help.outdent", this.lang.help.outdent), this.context.memo("help.formatPara", this.lang.help.formatPara), this.context.memo("help.insertHorizontalRule", this.lang.help.insertHorizontalRule), this.context.memo("help.fontName", this.lang.help.fontName);
                                            const e = ["bold", "italic", "underline", "strikethrough", "superscript", "subscript", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull", "formatBlock", "removeFormat", "backColor"];
                                            for (let t = 0, o = e.length; t < o; t++) this[e[t]] = (t => e => {
                                                this.beforeCommand(), document.execCommand(t, !1, e), this.afterCommand(!0)
                                            })(e[t]), this.context.memo("help." + e[t], this.lang.help[e[t]]);
                                            this.fontName = this.wrapCommand(t => this.fontStyling("font-family", f.validFontName(t))), this.fontSize = this.wrapCommand(t => this.fontStyling("font-size", t + "px"));
                                            for (let t = 1; t <= 6; t++) this["formatH" + t] = (t => () => {
                                                this.formatBlock("H" + t)
                                            })(t), this.context.memo("help.formatH" + t, this.lang.help["formatH" + t]);
                                            this.insertParagraph = this.wrapCommand(() => {
                                                this.typing.insertParagraph(this.editable)
                                            }), this.insertOrderedList = this.wrapCommand(() => {
                                                this.bullet.insertOrderedList(this.editable)
                                            }), this.insertUnorderedList = this.wrapCommand(() => {
                                                this.bullet.insertUnorderedList(this.editable)
                                            }), this.indent = this.wrapCommand(() => {
                                                this.bullet.indent(this.editable)
                                            }), this.outdent = this.wrapCommand(() => {
                                                this.bullet.outdent(this.editable)
                                            }), this.insertNode = this.wrapCommand(t => {
                                                this.isLimited(n()(t).text().length) || (this.getLastRange().insertNode(t), vt.createFromNodeAfter(t).select(), this.setLastRange())
                                            }), this.insertText = this.wrapCommand(t => {
                                                if (this.isLimited(t.length)) return;
                                                const e = this.getLastRange().insertNode(pt.createText(t));
                                                vt.create(e, pt.nodeLength(e)).select(), this.setLastRange()
                                            }), this.pasteHTML = this.wrapCommand(t => {
                                                if (this.isLimited(t.length)) return;
                                                t = this.context.invoke("codeview.purify", t);
                                                const e = this.getLastRange().pasteHTML(t);
                                                vt.createFromNodeAfter(w.last(e)).select(), this.setLastRange()
                                            }), this.formatBlock = this.wrapCommand((t, e) => {
                                                const o = this.options.callbacks.onApplyCustomStyle;
                                                o ? o.call(this, e, this.context, this.onFormatBlock) : this.onFormatBlock(t, e)
                                            }), this.insertHorizontalRule = this.wrapCommand(() => {
                                                const t = this.getLastRange().insertNode(pt.create("HR"));
                                                t.nextSibling && (vt.create(t.nextSibling, 0).normalize().select(), this.setLastRange())
                                            }), this.lineHeight = this.wrapCommand(t => {
                                                this.style.stylePara(this.getLastRange(), {
                                                    lineHeight: t
                                                })
                                            }), this.createLink = this.wrapCommand(t => {
                                                let e = t.url;
                                                const o = t.text,
                                                    i = t.isNewWindow;
                                                let s = t.range || this.getLastRange();
                                                const r = o.length - s.toString().length;
                                                if (r > 0 && this.isLimited(r)) return;
                                                const a = s.toString() !== o;
                                                "string" == typeof e && (e = e.trim()), e = this.options.onCreateLink ? this.options.onCreateLink(e) : /^([A-Za-z][A-Za-z0-9+-.]*\:|#|\/)/.test(e) ? e : "http://" + e;
                                                let l = [];
                                                if (a) {
                                                    const t = (s = s.deleteContents()).insertNode(n()("<A>" + o + "</A>")[0]);
                                                    l.push(t)
                                                } else l = this.style.styleNodes(s, {
                                                    nodeName: "A",
                                                    expandClosestSibling: !0,
                                                    onlyPartialContains: !0
                                                });
                                                n.a.each(l, (t, o) => {
                                                    n()(o).attr("href", e), i ? n()(o).attr("target", "_blank") : n()(o).removeAttr("target")
                                                });
                                                const c = vt.createFromNodeBefore(w.head(l)).getStartPoint(),
                                                    h = vt.createFromNodeAfter(w.last(l)).getEndPoint();
                                                vt.create(c.node, c.offset, h.node, h.offset).select(), this.setLastRange()
                                            }), this.color = this.wrapCommand(t => {
                                                const e = t.foreColor,
                                                    o = t.backColor;
                                                e && document.execCommand("foreColor", !1, e), o && document.execCommand("backColor", !1, o)
                                            }), this.foreColor = this.wrapCommand(t => {
                                                document.execCommand("styleWithCSS", !1, !0), document.execCommand("foreColor", !1, t)
                                            }), this.insertTable = this.wrapCommand(t => {
                                                const e = t.split("x");
                                                this.getLastRange().deleteContents().insertNode(this.table.createTable(e[0], e[1], this.options))
                                            }), this.removeMedia = this.wrapCommand(() => {
                                                let t = n()(this.restoreTarget()).parent();
                                                t.parent("figure").length ? t.parent("figure").remove() : t = n()(this.restoreTarget()).detach(), this.context.triggerEvent("media.delete", t, this.$editable)
                                            }), this.floatMe = this.wrapCommand(t => {
                                                const e = n()(this.restoreTarget());
                                                e.toggleClass("note-float-left", "left" === t), e.toggleClass("note-float-right", "right" === t), e.css("float", "none" === t ? "" : t)
                                            }), this.resize = this.wrapCommand(t => {
                                                const e = n()(this.restoreTarget());
                                                0 === (t = parseFloat(t)) ? e.css("width", "") : e.css({
                                                    width: 100 * t + "%",
                                                    height: ""
                                                })
                                            })
                                        }
                                        initialize() {
                                            this.$editable.on("keydown", t => {
                                                if (t.keyCode === Ct.code.ENTER && this.context.triggerEvent("enter", t), this.context.triggerEvent("keydown", t), t.isDefaultPrevented() || (this.options.shortcuts ? this.handleKeyMap(t) : this.preventDefaultEditableShortCuts(t)), this.isLimited(1, t)) return !1
                                            }).on("keyup", t => {
                                                this.setLastRange(), this.context.triggerEvent("keyup", t)
                                            }).on("focus", t => {
                                                this.setLastRange(), this.context.triggerEvent("focus", t)
                                            }).on("blur", t => {
                                                this.context.triggerEvent("blur", t)
                                            }).on("mousedown", t => {
                                                this.context.triggerEvent("mousedown", t)
                                            }).on("mouseup", t => {
                                                this.setLastRange(), this.context.triggerEvent("mouseup", t)
                                            }).on("scroll", t => {
                                                this.context.triggerEvent("scroll", t)
                                            }).on("paste", t => {
                                                this.setLastRange(), this.context.triggerEvent("paste", t)
                                            }), this.$editable.attr("spellcheck", this.options.spellCheck), this.$editable.html(pt.html(this.$note) || pt.emptyPara), this.$editable.on(f.inputEventName, b.debounce(() => {
                                                this.context.triggerEvent("change", this.$editable.html(), this.$editable)
                                            }, 10)), this.$editor.on("focusin", t => {
                                                this.context.triggerEvent("focusin", t)
                                            }).on("focusout", t => {
                                                this.context.triggerEvent("focusout", t)
                                            }), this.options.airMode || (this.options.width && this.$editor.outerWidth(this.options.width), this.options.height && this.$editable.outerHeight(this.options.height), this.options.maxHeight && this.$editable.css("max-height", this.options.maxHeight), this.options.minHeight && this.$editable.css("min-height", this.options.minHeight)), this.history.recordUndo(), this.setLastRange()
                                        }
                                        destroy() {
                                            this.$editable.off()
                                        }
                                        handleKeyMap(t) {
                                            const e = this.options.keyMap[f.isMac ? "mac" : "pc"],
                                                o = [];
                                            t.metaKey && o.push("CMD"), t.ctrlKey && !t.altKey && o.push("CTRL"), t.shiftKey && o.push("SHIFT");
                                            const i = Ct.nameFromCode[t.keyCode];
                                            i && o.push(i);
                                            const n = e[o.join("+")];
                                            n ? !1 !== this.context.invoke(n) && t.preventDefault() : Ct.isEdit(t.keyCode) && this.afterCommand()
                                        }
                                        preventDefaultEditableShortCuts(t) {
                                            (t.ctrlKey || t.metaKey) && w.contains([66, 73, 85], t.keyCode) && t.preventDefault()
                                        }
                                        isLimited(t, e) {
                                            return t = t || 0, (void 0 === e || !(Ct.isMove(e.keyCode) || e.ctrlKey || e.metaKey || w.contains([Ct.code.BACKSPACE, Ct.code.DELETE], e.keyCode))) && this.options.maxTextLength > 0 && this.$editable.text().length + t >= this.options.maxTextLength
                                        }
                                        createRange() {
                                            return this.focus(), this.setLastRange(), this.getLastRange()
                                        }
                                        setLastRange() {
                                            this.lastRange = vt.create(this.editable)
                                        }
                                        getLastRange() {
                                            return this.lastRange || this.setLastRange(), this.lastRange
                                        }
                                        saveRange(t) {
                                            t && this.getLastRange().collapse().select()
                                        }
                                        restoreRange() {
                                            this.lastRange && (this.lastRange.select(), this.focus())
                                        }
                                        saveTarget(t) {
                                            this.$editable.data("target", t)
                                        }
                                        clearTarget() {
                                            this.$editable.removeData("target")
                                        }
                                        restoreTarget() {
                                            return this.$editable.data("target")
                                        }
                                        currentStyle() {
                                            let t = vt.create();
                                            return t && (t = t.normalize()), t ? this.style.current(t) : this.style.fromNode(this.$editable)
                                        }
                                        styleFromNode(t) {
                                            return this.style.fromNode(t)
                                        }
                                        undo() {
                                            this.context.triggerEvent("before.command", this.$editable.html()), this.history.undo(), this.context.triggerEvent("change", this.$editable.html(), this.$editable)
                                        }
                                        commit() {
                                            this.context.triggerEvent("before.command", this.$editable.html()), this.history.commit(), this.context.triggerEvent("change", this.$editable.html(), this.$editable)
                                        }
                                        redo() {
                                            this.context.triggerEvent("before.command", this.$editable.html()), this.history.redo(), this.context.triggerEvent("change", this.$editable.html(), this.$editable)
                                        }
                                        beforeCommand() {
                                            this.context.triggerEvent("before.command", this.$editable.html()), this.focus()
                                        }
                                        afterCommand(t) {
                                            this.normalizeContent(), this.history.recordUndo(), t || this.context.triggerEvent("change", this.$editable.html(), this.$editable)
                                        }
                                        tab() {
                                            const t = this.getLastRange();
                                            if (t.isCollapsed() && t.isOnCell()) this.table.tab(t);
                                            else {
                                                if (0 === this.options.tabSize) return !1;
                                                this.isLimited(this.options.tabSize) || (this.beforeCommand(), this.typing.insertTab(t, this.options.tabSize), this.afterCommand())
                                            }
                                        }
                                        untab() {
                                            const t = this.getLastRange();
                                            if (t.isCollapsed() && t.isOnCell()) this.table.tab(t, !0);
                                            else if (0 === this.options.tabSize) return !1
                                        }
                                        wrapCommand(t) {
                                            return function() {
                                                this.beforeCommand(), t.apply(this, arguments), this.afterCommand()
                                            }
                                        }
                                        insertImage(t, e) {
                                            return (o = t, n.a.Deferred(t => {
                                                const e = n()("<img>");
                                                e.one("load", () => {
                                                    e.off("error abort"), t.resolve(e)
                                                }).one("error abort", () => {
                                                    e.off("load").detach(), t.reject(e)
                                                }).css({
                                                    display: "none"
                                                }).appendTo(document.body).attr("src", o)
                                            }).promise()).then(t => {
                                                this.beforeCommand(), "function" == typeof e ? e(t) : ("string" == typeof e && t.attr("data-filename", e), t.css("width", Math.min(this.$editable.width(), t.width()))), t.show(), vt.create(this.editable).insertNode(t[0]), vt.createFromNodeAfter(t[0]).select(), this.setLastRange(), this.afterCommand()
                                            }).fail(t => {
                                                this.context.triggerEvent("image.upload.error", t)
                                            });
                                            var o
                                        }
                                        insertImagesAsDataURL(t) {
                                            n.a.each(t, (t, e) => {
                                                const o = e.name;
                                                this.options.maximumImageFileSize && this.options.maximumImageFileSize < e.size ? this.context.triggerEvent("image.upload.error", this.lang.image.maximumFileSizeError) : function(t) {
                                                    return n.a.Deferred(e => {
                                                        n.a.extend(new FileReader, {
                                                            onload: t => {
                                                                const o = t.target.result;
                                                                e.resolve(o)
                                                            },
                                                            onerror: t => {
                                                                e.reject(t)
                                                            }
                                                        }).readAsDataURL(t)
                                                    }).promise()
                                                }(e).then(t => this.insertImage(t, o)).fail(() => {
                                                    this.context.triggerEvent("image.upload.error")
                                                })
                                            })
                                        }
                                        insertImagesOrCallback(t) {
                                            this.options.callbacks.onImageUpload ? this.context.triggerEvent("image.upload", t) : this.insertImagesAsDataURL(t)
                                        }
                                        getSelectedText() {
                                            let t = this.getLastRange();
                                            return t.isOnAnchor() && (t = vt.createFromNode(pt.ancestor(t.sc, pt.isAnchor))), t.toString()
                                        }
                                        onFormatBlock(t, e) {
                                            if (document.execCommand("FormatBlock", !1, f.isMSIE ? "<" + t + ">" : t), e && e.length && (e[0].tagName.toUpperCase() !== t.toUpperCase() && (e = e.find(t)), e && e.length)) {
                                                const o = e[0].className || "";
                                                if (o) {
                                                    const e = this.createRange();
                                                    n()([e.sc, e.ec]).closest(t).addClass(o)
                                                }
                                            }
                                        }
                                        formatPara() {
                                            this.formatBlock("P")
                                        }
                                        fontStyling(t, e) {
                                            const o = this.getLastRange();
                                            if (o) {
                                                const i = this.style.styleNodes(o);
                                                if (n()(i).css(t, e), o.isCollapsed()) {
                                                    const t = w.head(i);
                                                    t && !pt.nodeLength(t) && (t.innerHTML = pt.ZERO_WIDTH_NBSP_CHAR, vt.createFromNodeAfter(t.firstChild).select(), this.setLastRange(), this.$editable.data(Tt, t))
                                                }
                                            }
                                        }
                                        unlink() {
                                            let t = this.getLastRange();
                                            if (t.isOnAnchor()) {
                                                const e = pt.ancestor(t.sc, pt.isAnchor);
                                                (t = vt.createFromNode(e)).select(), this.setLastRange(), this.beforeCommand(), document.execCommand("unlink"), this.afterCommand()
                                            }
                                        }
                                        getLinkInfo() {
                                            const t = this.getLastRange().expand(pt.isAnchor),
                                                e = n()(w.head(t.nodes(pt.isAnchor))),
                                                o = {
                                                    range: t,
                                                    text: t.toString(),
                                                    url: e.length ? e.attr("href") : ""
                                                };
                                            return e.length && (o.isNewWindow = "_blank" === e.attr("target")), o
                                        }
                                        addRow(t) {
                                            const e = this.getLastRange(this.$editable);
                                            e.isCollapsed() && e.isOnCell() && (this.beforeCommand(), this.table.addRow(e, t), this.afterCommand())
                                        }
                                        addCol(t) {
                                            const e = this.getLastRange(this.$editable);
                                            e.isCollapsed() && e.isOnCell() && (this.beforeCommand(), this.table.addCol(e, t), this.afterCommand())
                                        }
                                        deleteRow() {
                                            const t = this.getLastRange(this.$editable);
                                            t.isCollapsed() && t.isOnCell() && (this.beforeCommand(), this.table.deleteRow(t), this.afterCommand())
                                        }
                                        deleteCol() {
                                            const t = this.getLastRange(this.$editable);
                                            t.isCollapsed() && t.isOnCell() && (this.beforeCommand(), this.table.deleteCol(t), this.afterCommand())
                                        }
                                        deleteTable() {
                                            const t = this.getLastRange(this.$editable);
                                            t.isCollapsed() && t.isOnCell() && (this.beforeCommand(), this.table.deleteTable(t), this.afterCommand())
                                        }
                                        resizeTo(t, e, o) {
                                            let i;
                                            if (o) {
                                                const o = t.y / t.x,
                                                    n = e.data("ratio");
                                                i = {
                                                    width: n > o ? t.x : t.y / n,
                                                    height: n > o ? t.x * n : t.y
                                                }
                                            } else i = {
                                                width: t.x,
                                                height: t.y
                                            };
                                            e.css(i)
                                        }
                                        hasFocus() {
                                            return this.$editable.is(":focus")
                                        }
                                        focus() {
                                            this.hasFocus() || this.$editable.focus()
                                        }
                                        isEmpty() {
                                            return pt.isEmpty(this.$editable[0]) || pt.emptyPara === this.$editable.html()
                                        }
                                        empty() {
                                            this.context.invoke("code", pt.emptyPara)
                                        }
                                        normalizeContent() {
                                            this.$editable[0].normalize()
                                        }
                                    },
                                    clipboard: class {
                                        constructor(t) {
                                            this.context = t, this.$editable = t.layoutInfo.editable
                                        }
                                        initialize() {
                                            this.$editable.on("paste", this.pasteByEvent.bind(this))
                                        }
                                        pasteByEvent(t) {
                                            const e = t.originalEvent.clipboardData;
                                            if (e && e.items && e.items.length) {
                                                const t = e.items.length > 1 ? e.items[1] : w.head(e.items);
                                                "file" === t.kind && -1 !== t.type.indexOf("image/") && this.context.invoke("editor.insertImagesOrCallback", [t.getAsFile()]), this.context.invoke("editor.afterCommand")
                                            }
                                        }
                                    },
                                    dropzone: class {
                                        constructor(t) {
                                            this.context = t, this.$eventListener = n()(document), this.$editor = t.layoutInfo.editor, this.$editable = t.layoutInfo.editable, this.options = t.options, this.lang = this.options.langInfo, this.documentEventHandlers = {}, this.$dropzone = n()(['<div class="note-dropzone">', '  <div class="note-dropzone-message"/>', "</div>"].join("")).prependTo(this.$editor)
                                        }
                                        shouldInitialize() {
                                            return !this.options.disableDragAndDrop
                                        }
                                        initialize() {
                                            this.attachDragAndDropEvent()
                                        }
                                        attachDragAndDropEvent() {
                                            let t = n()();
                                            const e = this.$dropzone.find(".note-dropzone-message");
                                            this.documentEventHandlers.onDragenter = o => {
                                                const i = this.context.invoke("codeview.isActivated"),
                                                    n = this.$editor.width() > 0 && this.$editor.height() > 0;
                                                i || t.length || !n || (this.$editor.addClass("dragover"), this.$dropzone.width(this.$editor.width()), this.$dropzone.height(this.$editor.height()), e.text(this.lang.image.dragImageHere)), t = t.add(o.target)
                                            }, this.documentEventHandlers.onDragleave = e => {
                                                (t = t.not(e.target)).length && "BODY" !== e.target.nodeName || (t = n()(), this.$editor.removeClass("dragover"))
                                            }, this.documentEventHandlers.onDrop = () => {
                                                t = n()(), this.$editor.removeClass("dragover")
                                            }, this.$eventListener.on("dragenter", this.documentEventHandlers.onDragenter).on("dragleave", this.documentEventHandlers.onDragleave).on("drop", this.documentEventHandlers.onDrop), this.$dropzone.on("dragenter", () => {
                                                this.$dropzone.addClass("hover"), e.text(this.lang.image.dropImage)
                                            }).on("dragleave", () => {
                                                this.$dropzone.removeClass("hover"), e.text(this.lang.image.dragImageHere)
                                            }), this.$dropzone.on("drop", t => {
                                                const e = t.originalEvent.dataTransfer;
                                                t.preventDefault(), e && e.files && e.files.length ? (this.$editable.focus(), this.context.invoke("editor.insertImagesOrCallback", e.files)) : n.a.each(e.types, (t, o) => {
                                                    const i = e.getData(o);
                                                    o.toLowerCase().indexOf("text") > -1 ? this.context.invoke("editor.pasteHTML", i) : n()(i).each((t, e) => {
                                                        this.context.invoke("editor.insertNode", e)
                                                    })
                                                })
                                            }).on("dragover", !1)
                                        }
                                        destroy() {
                                            Object.keys(this.documentEventHandlers).forEach(t => {
                                                this.$eventListener.off(t.substr(2).toLowerCase(), this.documentEventHandlers[t])
                                            }), this.documentEventHandlers = {}
                                        }
                                    },
                                    codeview: class {
                                        constructor(t) {
                                            this.context = t, this.$editor = t.layoutInfo.editor, this.$editable = t.layoutInfo.editable, this.$codable = t.layoutInfo.codable, this.options = t.options
                                        }
                                        sync() {
                                            this.isActivated() && f.hasCodeMirror && this.$codable.data("cmEditor").save()
                                        }
                                        isActivated() {
                                            return this.$editor.hasClass("codeview")
                                        }
                                        toggle() {
                                            this.isActivated() ? this.deactivate() : this.activate(), this.context.triggerEvent("codeview.toggled")
                                        }
                                        purify(t) {
                                            if (this.options.codeviewFilter && (t = t.replace(this.options.codeviewFilterRegex, ""), this.options.codeviewIframeFilter)) {
                                                const e = this.options.codeviewIframeWhitelistSrc.concat(this.options.codeviewIframeWhitelistSrcBase);
                                                t = t.replace(/(<iframe.*?>.*?(?:<\/iframe>)?)/gi, function(t) {
                                                    if (/<.+src(?==?('|"|\s)?)[\s\S]+src(?=('|"|\s)?)[^>]*?>/i.test(t)) return "";
                                                    for (const o of e)
                                                        if (new RegExp('src="(https?:)?//' + o.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&") + '/(.+)"').test(t)) return t;
                                                    return ""
                                                })
                                            }
                                            return t
                                        }
                                        activate() {
                                            if (this.$codable.val(pt.html(this.$editable, this.options.prettifyHtml)), this.$codable.height(this.$editable.height()), this.context.invoke("toolbar.updateCodeview", !0), this.$editor.addClass("codeview"), this.$codable.focus(), f.hasCodeMirror) {
                                                const t = Nt.fromTextArea(this.$codable[0], this.options.codemirror);
                                                if (this.options.codemirror.tern) {
                                                    const e = new Nt.TernServer(this.options.codemirror.tern);
                                                    t.ternServer = e, t.on("cursorActivity", t => {
                                                        e.updateArgHints(t)
                                                    })
                                                }
                                                t.on("blur", e => {
                                                    this.context.triggerEvent("blur.codeview", t.getValue(), e)
                                                }), t.on("change", e => {
                                                    this.context.triggerEvent("change.codeview", t.getValue(), t)
                                                }), t.setSize(null, this.$editable.outerHeight()), this.$codable.data("cmEditor", t)
                                            } else this.$codable.on("blur", t => {
                                                this.context.triggerEvent("blur.codeview", this.$codable.val(), t)
                                            }), this.$codable.on("input", t => {
                                                this.context.triggerEvent("change.codeview", this.$codable.val(), this.$codable)
                                            })
                                        }
                                        deactivate() {
                                            if (f.hasCodeMirror) {
                                                const t = this.$codable.data("cmEditor");
                                                this.$codable.val(t.getValue()), t.toTextArea()
                                            }
                                            const t = this.purify(pt.value(this.$codable, this.options.prettifyHtml) || pt.emptyPara),
                                                e = this.$editable.html() !== t;
                                            this.$editable.html(t), this.$editable.height(this.options.height ? this.$codable.height() : "auto"), this.$editor.removeClass("codeview"), e && this.context.triggerEvent("change", this.$editable.html(), this.$editable), this.$editable.focus(), this.context.invoke("toolbar.updateCodeview", !1)
                                        }
                                        destroy() {
                                            this.isActivated() && this.deactivate()
                                        }
                                    },
                                    statusbar: class {
                                        constructor(t) {
                                            this.$document = n()(document), this.$statusbar = t.layoutInfo.statusbar, this.$editable = t.layoutInfo.editable, this.options = t.options
                                        }
                                        initialize() {
                                            this.options.airMode || this.options.disableResizeEditor ? this.destroy() : this.$statusbar.on("mousedown", t => {
                                                t.preventDefault(), t.stopPropagation();
                                                const e = this.$editable.offset().top - this.$document.scrollTop(),
                                                    o = t => {
                                                        let o = t.clientY - (e + Et);
                                                        o = this.options.minheight > 0 ? Math.max(o, this.options.minheight) : o, o = this.options.maxHeight > 0 ? Math.min(o, this.options.maxHeight) : o, this.$editable.height(o)
                                                    };
                                                this.$document.on("mousemove", o).one("mouseup", () => {
                                                    this.$document.off("mousemove", o)
                                                })
                                            })
                                        }
                                        destroy() {
                                            this.$statusbar.off(), this.$statusbar.addClass("locked")
                                        }
                                    },
                                    fullscreen: class {
                                        constructor(t) {
                                            this.context = t, this.$editor = t.layoutInfo.editor, this.$toolbar = t.layoutInfo.toolbar, this.$editable = t.layoutInfo.editable, this.$codable = t.layoutInfo.codable, this.$window = n()(window), this.$scrollbar = n()("html, body"), this.onResize = () => {
                                                this.resizeTo({
                                                    h: this.$window.height() - this.$toolbar.outerHeight()
                                                })
                                            }
                                        }
                                        resizeTo(t) {
                                            this.$editable.css("height", t.h), this.$codable.css("height", t.h), this.$codable.data("cmeditor") && this.$codable.data("cmeditor").setsize(null, t.h)
                                        }
                                        toggle() {
                                            this.$editor.toggleClass("fullscreen"), this.isFullscreen() ? (this.$editable.data("orgHeight", this.$editable.css("height")), this.$editable.data("orgMaxHeight", this.$editable.css("maxHeight")), this.$editable.css("maxHeight", ""), this.$window.on("resize", this.onResize).trigger("resize"), this.$scrollbar.css("overflow", "hidden")) : (this.$window.off("resize", this.onResize), this.resizeTo({
                                                h: this.$editable.data("orgHeight")
                                            }), this.$editable.css("maxHeight", this.$editable.css("orgMaxHeight")), this.$scrollbar.css("overflow", "visible")), this.context.invoke("toolbar.updateFullscreen", this.isFullscreen())
                                        }
                                        isFullscreen() {
                                            return this.$editor.hasClass("fullscreen")
                                        }
                                    },
                                    handle: class {
                                        constructor(t) {
                                            this.context = t, this.$document = n()(document), this.$editingArea = t.layoutInfo.editingArea, this.options = t.options, this.lang = this.options.langInfo, this.events = {
                                                "summernote.mousedown": (t, e) => {
                                                    this.update(e.target, e) && e.preventDefault()
                                                },
                                                "summernote.keyup summernote.scroll summernote.change summernote.dialog.shown": () => {
                                                    this.update()
                                                },
                                                "summernote.disable": () => {
                                                    this.hide()
                                                },
                                                "summernote.codeview.toggled": () => {
                                                    this.update()
                                                }
                                            }
                                        }
                                        initialize() {
                                            this.$handle = n()(['<div class="note-handle">', '<div class="note-control-selection">', '<div class="note-control-selection-bg"></div>', '<div class="note-control-holder note-control-nw"></div>', '<div class="note-control-holder note-control-ne"></div>', '<div class="note-control-holder note-control-sw"></div>', '<div class="', this.options.disableResizeImage ? "note-control-holder" : "note-control-sizing", ' note-control-se"></div>', this.options.disableResizeImage ? "" : '<div class="note-control-selection-info"></div>', "</div>", "</div>"].join("")).prependTo(this.$editingArea), this.$handle.on("mousedown", t => {
                                                if (pt.isControlSizing(t.target)) {
                                                    t.preventDefault(), t.stopPropagation();
                                                    const e = this.$handle.find(".note-control-selection").data("target"),
                                                        o = e.offset(),
                                                        i = this.$document.scrollTop(),
                                                        n = t => {
                                                            this.context.invoke("editor.resizeTo", {
                                                                x: t.clientX - o.left,
                                                                y: t.clientY - (o.top - i)
                                                            }, e, !t.shiftKey), this.update(e[0], t)
                                                        };
                                                    this.$document.on("mousemove", n).one("mouseup", t => {
                                                        t.preventDefault(), this.$document.off("mousemove", n), this.context.invoke("editor.afterCommand")
                                                    }), e.data("ratio") || e.data("ratio", e.height() / e.width())
                                                }
                                            }), this.$handle.on("wheel", t => {
                                                t.preventDefault(), this.update()
                                            })
                                        }
                                        destroy() {
                                            this.$handle.remove()
                                        }
                                        update(t, e) {
                                            if (this.context.isDisabled()) return !1;
                                            const o = pt.isImg(t),
                                                i = this.$handle.find(".note-control-selection");
                                            if (this.context.invoke("imagePopover.update", t, e), o) {
                                                const e = n()(t),
                                                    o = e.position(),
                                                    s = {
                                                        left: o.left + parseInt(e.css("marginLeft"), 10),
                                                        top: o.top + parseInt(e.css("marginTop"), 10)
                                                    },
                                                    r = {
                                                        w: e.outerWidth(!1),
                                                        h: e.outerHeight(!1)
                                                    };
                                                i.css({
                                                    display: "block",
                                                    left: s.left,
                                                    top: s.top,
                                                    width: r.w,
                                                    height: r.h
                                                }).data("target", e);
                                                const a = new Image;
                                                a.src = e.attr("src");
                                                const l = r.w + "x" + r.h + " (" + this.lang.image.original + ": " + a.width + "x" + a.height + ")";
                                                i.find(".note-control-selection-info").text(l), this.context.invoke("editor.saveTarget", t)
                                            } else this.hide();
                                            return o
                                        }
                                        hide() {
                                            this.context.invoke("editor.clearTarget"), this.$handle.children().hide()
                                        }
                                    },
                                    hintPopover: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.$editable = t.layoutInfo.editable, this.options = t.options, this.hint = this.options.hint || [], this.direction = this.options.hintDirection || "bottom", this.hints = Array.isArray(this.hint) ? this.hint : [this.hint], this.events = {
                                                "summernote.keyup": (t, e) => {
                                                    e.isDefaultPrevented() || this.handleKeyup(e)
                                                },
                                                "summernote.keydown": (t, e) => {
                                                    this.handleKeydown(e)
                                                },
                                                "summernote.disable summernote.dialog.shown": () => {
                                                    this.hide()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return this.hints.length > 0
                                        }
                                        initialize() {
                                            this.lastWordRange = null, this.$popover = this.ui.popover({
                                                className: "note-hint-popover",
                                                hideArrow: !0,
                                                direction: ""
                                            }).render().appendTo(this.options.container), this.$popover.hide(), this.$content = this.$popover.find(".popover-content,.note-popover-content"), this.$content.on("click", ".note-hint-item", t => {
                                                this.$content.find(".active").removeClass("active"), n()(t.currentTarget).addClass("active"), this.replace()
                                            })
                                        }
                                        destroy() {
                                            this.$popover.remove()
                                        }
                                        selectItem(t) {
                                            this.$content.find(".active").removeClass("active"), t.addClass("active"), this.$content[0].scrollTop = t[0].offsetTop - this.$content.innerHeight() / 2
                                        }
                                        moveDown() {
                                            const t = this.$content.find(".note-hint-item.active"),
                                                e = t.next();
                                            if (e.length) this.selectItem(e);
                                            else {
                                                let e = t.parent().next();
                                                e.length || (e = this.$content.find(".note-hint-group").first()), this.selectItem(e.find(".note-hint-item").first())
                                            }
                                        }
                                        moveUp() {
                                            const t = this.$content.find(".note-hint-item.active"),
                                                e = t.prev();
                                            if (e.length) this.selectItem(e);
                                            else {
                                                let e = t.parent().prev();
                                                e.length || (e = this.$content.find(".note-hint-group").last()), this.selectItem(e.find(".note-hint-item").last())
                                            }
                                        }
                                        replace() {
                                            const t = this.$content.find(".note-hint-item.active");
                                            if (t.length) {
                                                const e = this.nodeFromItem(t);
                                                this.lastWordRange.insertNode(e), vt.createFromNode(e).collapse().select(), this.lastWordRange = null, this.hide(), this.context.triggerEvent("change", this.$editable.html(), this.$editable[0]), this.context.invoke("editor.focus")
                                            }
                                        }
                                        nodeFromItem(t) {
                                            const e = this.hints[t.data("index")],
                                                o = t.data("item");
                                            let i = e.content ? e.content(o) : o;
                                            return "string" == typeof i && (i = pt.createText(i)), i
                                        }
                                        createItemTemplates(t, e) {
                                            const o = this.hints[t];
                                            return e.map((e, i) => {
                                                const s = n()('<div class="note-hint-item"/>');
                                                return s.append(o.template ? o.template(e) : e + ""), s.data({
                                                    index: t,
                                                    item: e
                                                }), s
                                            })
                                        }
                                        handleKeydown(t) {
                                            this.$popover.is(":visible") && (t.keyCode === Ct.code.ENTER ? (t.preventDefault(), this.replace()) : t.keyCode === Ct.code.UP ? (t.preventDefault(), this.moveUp()) : t.keyCode === Ct.code.DOWN && (t.preventDefault(), this.moveDown()))
                                        }
                                        searchKeyword(t, e, o) {
                                            const i = this.hints[t];
                                            if (i && i.match.test(e) && i.search) {
                                                const t = i.match.exec(e);
                                                i.search(t[1], o)
                                            } else o()
                                        }
                                        createGroup(t, e) {
                                            const o = n()('<div class="note-hint-group note-hint-group-' + t + '"/>');
                                            return this.searchKeyword(t, e, e => {
                                                (e = e || []).length && (o.html(this.createItemTemplates(t, e)), this.show())
                                            }), o
                                        }
                                        handleKeyup(t) {
                                            if (!w.contains([Ct.code.ENTER, Ct.code.UP, Ct.code.DOWN], t.keyCode)) {
                                                const t = this.context.invoke("editor.getLastRange").getWordRange(),
                                                    e = t.toString();
                                                if (this.hints.length && e) {
                                                    this.$content.empty();
                                                    const o = b.rect2bnd(w.last(t.getClientRects()));
                                                    o && (this.$popover.hide(), this.lastWordRange = t, this.hints.forEach((t, o) => {
                                                        t.match.test(e) && this.createGroup(o, e).appendTo(this.$content)
                                                    }), this.$content.find(".note-hint-item:first").addClass("active"), "top" === this.direction ? this.$popover.css({
                                                        left: o.left,
                                                        top: o.top - this.$popover.outerHeight() - Ft
                                                    }) : this.$popover.css({
                                                        left: o.left,
                                                        top: o.top + o.height + Ft
                                                    }))
                                                } else this.hide()
                                            }
                                        }
                                        show() {
                                            this.$popover.show()
                                        }
                                        hide() {
                                            this.$popover.hide()
                                        }
                                    },
                                    autoLink: class {
                                        constructor(t) {
                                            this.context = t, this.events = {
                                                "summernote.keyup": (t, e) => {
                                                    e.isDefaultPrevented() || this.handleKeyup(e)
                                                },
                                                "summernote.keydown": (t, e) => {
                                                    this.handleKeydown(e)
                                                }
                                            }
                                        }
                                        initialize() {
                                            this.lastWordRange = null
                                        }
                                        destroy() {
                                            this.lastWordRange = null
                                        }
                                        replace() {
                                            if (!this.lastWordRange) return;
                                            const t = this.lastWordRange.toString(),
                                                e = t.match(Lt);
                                            if (e && (e[1] || e[2])) {
                                                const o = e[1] ? t : Rt + t,
                                                    i = n()("<a />").html(t).attr("href", o)[0];
                                                this.context.options.linkTargetBlank && n()(i).attr("target", "_blank"), this.lastWordRange.insertNode(i), this.lastWordRange = null, this.context.invoke("editor.focus")
                                            }
                                        }
                                        handleKeydown(t) {
                                            if (w.contains([Ct.code.ENTER, Ct.code.SPACE], t.keyCode)) {
                                                const t = this.context.invoke("editor.createRange").getWordRange();
                                                this.lastWordRange = t
                                            }
                                        }
                                        handleKeyup(t) {
                                            w.contains([Ct.code.ENTER, Ct.code.SPACE], t.keyCode) && this.replace()
                                        }
                                    },
                                    autoSync: class {
                                        constructor(t) {
                                            this.$note = t.layoutInfo.note, this.events = {
                                                "summernote.change": () => {
                                                    this.$note.val(t.invoke("code"))
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return pt.isTextarea(this.$note[0])
                                        }
                                    },
                                    autoReplace: class {
                                        constructor(t) {
                                            this.context = t, this.options = t.options.replace || {}, this.keys = [Ct.code.ENTER, Ct.code.SPACE, Ct.code.PERIOD, Ct.code.COMMA, Ct.code.SEMICOLON, Ct.code.SLASH], this.previousKeydownCode = null, this.events = {
                                                "summernote.keyup": (t, e) => {
                                                    e.isDefaultPrevented() || this.handleKeyup(e)
                                                },
                                                "summernote.keydown": (t, e) => {
                                                    this.handleKeydown(e)
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return !!this.options.match
                                        }
                                        initialize() {
                                            this.lastWord = null
                                        }
                                        destroy() {
                                            this.lastWord = null
                                        }
                                        replace() {
                                            if (!this.lastWord) return;
                                            const t = this,
                                                e = this.lastWord.toString();
                                            this.options.match(e, function(e) {
                                                if (e) {
                                                    let o = "";
                                                    if ("string" == typeof e ? o = pt.createText(e) : e instanceof jQuery ? o = e[0] : e instanceof Node && (o = e), !o) return;
                                                    t.lastWord.insertNode(o), t.lastWord = null, t.context.invoke("editor.focus")
                                                }
                                            })
                                        }
                                        handleKeydown(t) {
                                            if (this.previousKeydownCode && w.contains(this.keys, this.previousKeydownCode)) this.previousKeydownCode = t.keyCode;
                                            else {
                                                if (w.contains(this.keys, t.keyCode)) {
                                                    const t = this.context.invoke("editor.createRange").getWordRange();
                                                    this.lastWord = t
                                                }
                                                this.previousKeydownCode = t.keyCode
                                            }
                                        }
                                        handleKeyup(t) {
                                            w.contains(this.keys, t.keyCode) && this.replace()
                                        }
                                    },
                                    placeholder: class {
                                        constructor(t) {
                                            this.context = t, this.$editingArea = t.layoutInfo.editingArea, this.options = t.options, !0 === this.options.inheritPlaceholder && (this.options.placeholder = this.context.$note.attr("placeholder") || this.options.placeholder), this.events = {
                                                "summernote.init summernote.change": () => {
                                                    this.update()
                                                },
                                                "summernote.codeview.toggled": () => {
                                                    this.update()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return !!this.options.placeholder
                                        }
                                        initialize() {
                                            this.$placeholder = n()('<div class="note-placeholder">'), this.$placeholder.on("click", () => {
                                                this.context.invoke("focus")
                                            }).html(this.options.placeholder).prependTo(this.$editingArea), this.update()
                                        }
                                        destroy() {
                                            this.$placeholder.remove()
                                        }
                                        update() {
                                            const t = !this.context.invoke("codeview.isActivated") && this.context.invoke("editor.isEmpty");
                                            this.$placeholder.toggle(t)
                                        }
                                    },
                                    buttons: class {
                                        constructor(t) {
                                            this.ui = n.a.summernote.ui, this.context = t, this.$toolbar = t.layoutInfo.toolbar, this.options = t.options, this.lang = this.options.langInfo, this.invertedKeyMap = b.invertObject(this.options.keyMap[f.isMac ? "mac" : "pc"])
                                        }
                                        representShortcut(t) {
                                            let e = this.invertedKeyMap[t];
                                            return this.options.shortcuts && e ? (f.isMac && (e = e.replace("CMD", "⌘").replace("SHIFT", "⇧")), " (" + (e = e.replace("BACKSLASH", "\\").replace("SLASH", "/").replace("LEFTBRACKET", "[").replace("RIGHTBRACKET", "]")) + ")") : ""
                                        }
                                        button(t) {
                                            return !this.options.tooltip && t.tooltip && delete t.tooltip, t.container = this.options.container, this.ui.button(t)
                                        }
                                        initialize() {
                                            this.addToolbarButtons(), this.addImagePopoverButtons(), this.addLinkPopoverButtons(), this.addTablePopoverButtons(), this.fontInstalledMap = {}
                                        }
                                        destroy() {
                                            delete this.fontInstalledMap
                                        }
                                        isFontInstalled(t) {
                                            return this.fontInstalledMap.hasOwnProperty(t) || (this.fontInstalledMap[t] = f.isFontInstalled(t) || w.contains(this.options.fontNamesIgnoreCheck, t)), this.fontInstalledMap[t]
                                        }
                                        isFontDeservedToAdd(t) {
                                            return "" !== (t = t.toLowerCase()) && this.isFontInstalled(t) && -1 === f.genericFontFamilies.indexOf(t)
                                        }
                                        colorPalette(t, e, o, i) {
                                            return this.ui.buttonGroup({
                                                className: "note-color " + t,
                                                children: [this.button({
                                                    className: "note-current-color-button",
                                                    contents: this.ui.icon(this.options.icons.font + " note-recent-color"),
                                                    tooltip: e,
                                                    click: t => {
                                                        const e = n()(t.currentTarget);
                                                        o && i ? this.context.invoke("editor.color", {
                                                            backColor: e.attr("data-backColor"),
                                                            foreColor: e.attr("data-foreColor")
                                                        }) : o ? this.context.invoke("editor.color", {
                                                            backColor: e.attr("data-backColor")
                                                        }) : i && this.context.invoke("editor.color", {
                                                            foreColor: e.attr("data-foreColor")
                                                        })
                                                    },
                                                    callback: t => {
                                                        const e = t.find(".note-recent-color");
                                                        o && (e.css("background-color", this.options.colorButton.backColor), t.attr("data-backColor", this.options.colorButton.backColor)), i ? (e.css("color", this.options.colorButton.foreColor), t.attr("data-foreColor", this.options.colorButton.foreColor)) : e.css("color", "transparent")
                                                    }
                                                }), this.button({
                                                    className: "dropdown-toggle",
                                                    contents: this.ui.dropdownButtonContents("", this.options),
                                                    tooltip: this.lang.color.more,
                                                    data: {
                                                        toggle: "dropdown"
                                                    }
                                                }), this.ui.dropdown({
                                                    items: (o ? ['<div class="note-palette">', '  <div class="note-palette-title">' + this.lang.color.background + "</div>", "  <div>", '    <button type="button" class="note-color-reset btn btn-light" data-event="backColor" data-value="inherit">', this.lang.color.transparent, "    </button>", "  </div>", '  <div class="note-holder" data-event="backColor"/>', "  <div>", '    <button type="button" class="note-color-select btn" data-event="openPalette" data-value="backColorPicker">', this.lang.color.cpSelect, "    </button>", '    <input type="color" id="backColorPicker" class="note-btn note-color-select-btn" value="' + this.options.colorButton.backColor + '" data-event="backColorPalette">', "  </div>", '  <div class="note-holder-custom" id="backColorPalette" data-event="backColor"/>', "</div>"].join("") : "") + (i ? ['<div class="note-palette">', '  <div class="note-palette-title">' + this.lang.color.foreground + "</div>", "  <div>", '    <button type="button" class="note-color-reset btn btn-light" data-event="removeFormat" data-value="foreColor">', this.lang.color.resetToDefault, "    </button>", "  </div>", '  <div class="note-holder" data-event="foreColor"/>', "  <div>", '    <button type="button" class="note-color-select btn" data-event="openPalette" data-value="foreColorPicker">', this.lang.color.cpSelect, "    </button>", '    <input type="color" id="foreColorPicker" class="note-btn note-color-select-btn" value="' + this.options.colorButton.foreColor + '" data-event="foreColorPalette">', '  <div class="note-holder-custom" id="foreColorPalette" data-event="foreColor"/>', "</div>"].join("") : ""),
                                                    callback: t => {
                                                        t.find(".note-holder").each((t, e) => {
                                                            const o = n()(e);
                                                            o.append(this.ui.palette({
                                                                colors: this.options.colors,
                                                                colorsName: this.options.colorsName,
                                                                eventName: o.data("event"),
                                                                container: this.options.container,
                                                                tooltip: this.options.tooltip
                                                            }).render())
                                                        });
                                                        var e = [
                                                            ["#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF", "#FFFFFF"]
                                                        ];
                                                        t.find(".note-holder-custom").each((t, o) => {
                                                            const i = n()(o);
                                                            i.append(this.ui.palette({
                                                                colors: e,
                                                                colorsName: e,
                                                                eventName: i.data("event"),
                                                                container: this.options.container,
                                                                tooltip: this.options.tooltip
                                                            }).render())
                                                        }), t.find("input[type=color]").each((e, o) => {
                                                            n()(o).change(function() {
                                                                const e = t.find("#" + n()(this).data("event")).find(".note-color-btn").first(),
                                                                    o = this.value.toUpperCase();
                                                                e.css("background-color", o).attr("aria-label", o).attr("data-value", o).attr("data-original-title", o), e.click()
                                                            })
                                                        })
                                                    },
                                                    click: e => {
                                                        e.stopPropagation();
                                                        const o = n()("." + t),
                                                            i = n()(e.target),
                                                            s = i.data("event");
                                                        let r = i.attr("data-value");
                                                        if ("openPalette" === s) {
                                                            const t = o.find("#" + r),
                                                                e = n()(o.find("#" + t.data("event")).find(".note-color-row")[0]),
                                                                i = e.find(".note-color-btn").last().detach(),
                                                                s = t.val();
                                                            i.css("background-color", s).attr("aria-label", s).attr("data-value", s).attr("data-original-title", s), e.prepend(i), t.click()
                                                        } else if (w.contains(["backColor", "foreColor"], s)) {
                                                            const t = "backColor" === s ? "background-color" : "color",
                                                                e = i.closest(".note-color").find(".note-recent-color"),
                                                                o = i.closest(".note-color").find(".note-current-color-button");
                                                            e.css(t, r), o.attr("data-" + s, r), this.context.invoke("editor." + s, r)
                                                        }
                                                    }
                                                })]
                                            }).render()
                                        }
                                        addToolbarButtons() {
                                            this.context.memo("button.style", () => this.ui.buttonGroup([this.button({
                                                className: "dropdown-toggle",
                                                contents: this.ui.dropdownButtonContents(this.ui.icon(this.options.icons.magic), this.options),
                                                tooltip: this.lang.style.style,
                                                data: {
                                                    toggle: "dropdown"
                                                }
                                            }), this.ui.dropdown({
                                                className: "dropdown-style",
                                                items: this.options.styleTags,
                                                title: this.lang.style.style,
                                                template: t => {
                                                    "string" == typeof t && (t = {
                                                        tag: t,
                                                        title: this.lang.style.hasOwnProperty(t) ? this.lang.style[t] : t
                                                    });
                                                    const e = t.tag,
                                                        o = t.title;
                                                    return "<" + e + (t.style ? ' style="' + t.style + '" ' : "") + (t.className ? ' class="' + t.className + '"' : "") + ">" + o + "</" + e + ">"
                                                },
                                                click: this.context.createInvokeHandler("editor.formatBlock")
                                            })]).render());
                                            for (let t = 0, e = this.options.styleTags.length; t < e; t++) {
                                                const e = this.options.styleTags[t];
                                                this.context.memo("button.style." + e, () => this.button({
                                                    className: "note-btn-style-" + e,
                                                    contents: '<div data-value="' + e + '">' + e.toUpperCase() + "</div>",
                                                    tooltip: this.lang.style[e],
                                                    click: this.context.createInvokeHandler("editor.formatBlock")
                                                }).render())
                                            }
                                            this.context.memo("button.bold", () => this.button({
                                                className: "note-btn-bold",
                                                contents: this.ui.icon(this.options.icons.bold),
                                                tooltip: this.lang.font.bold + this.representShortcut("bold"),
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.bold")
                                            }).render()), this.context.memo("button.italic", () => this.button({
                                                className: "note-btn-italic",
                                                contents: this.ui.icon(this.options.icons.italic),
                                                tooltip: this.lang.font.italic + this.representShortcut("italic"),
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.italic")
                                            }).render()), this.context.memo("button.underline", () => this.button({
                                                className: "note-btn-underline",
                                                contents: this.ui.icon(this.options.icons.underline),
                                                tooltip: this.lang.font.underline + this.representShortcut("underline"),
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.underline")
                                            }).render()), this.context.memo("button.clear", () => this.button({
                                                contents: this.ui.icon(this.options.icons.eraser),
                                                tooltip: this.lang.font.clear + this.representShortcut("removeFormat"),
                                                click: this.context.createInvokeHandler("editor.removeFormat")
                                            }).render()), this.context.memo("button.strikethrough", () => this.button({
                                                className: "note-btn-strikethrough",
                                                contents: this.ui.icon(this.options.icons.strikethrough),
                                                tooltip: this.lang.font.strikethrough + this.representShortcut("strikethrough"),
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.strikethrough")
                                            }).render()), this.context.memo("button.superscript", () => this.button({
                                                className: "note-btn-superscript",
                                                contents: this.ui.icon(this.options.icons.superscript),
                                                tooltip: this.lang.font.superscript,
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.superscript")
                                            }).render()), this.context.memo("button.subscript", () => this.button({
                                                className: "note-btn-subscript",
                                                contents: this.ui.icon(this.options.icons.subscript),
                                                tooltip: this.lang.font.subscript,
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.subscript")
                                            }).render()), this.context.memo("button.fontname", () => {
                                                const t = this.context.invoke("editor.currentStyle");
                                                return this.options.addDefaultFonts && n.a.each(t["font-family"].split(","), (t, e) => {
                                                    e = e.trim().replace(/['"]+/g, ""), this.isFontDeservedToAdd(e) && -1 === this.options.fontNames.indexOf(e) && this.options.fontNames.push(e)
                                                }), this.ui.buttonGroup([this.button({
                                                    className: "dropdown-toggle",
                                                    contents: this.ui.dropdownButtonContents('<span class="note-current-fontname"/>', this.options),
                                                    tooltip: this.lang.font.name,
                                                    data: {
                                                        toggle: "dropdown"
                                                    }
                                                }), this.ui.dropdownCheck({
                                                    className: "dropdown-fontname",
                                                    checkClassName: this.options.icons.menuCheck,
                                                    items: this.options.fontNames.filter(this.isFontInstalled.bind(this)),
                                                    title: this.lang.font.name,
                                                    template: t => '<span style="font-family: ' + f.validFontName(t) + '">' + t + "</span>",
                                                    click: this.context.createInvokeHandlerAndUpdateState("editor.fontName")
                                                })]).render()
                                            }), this.context.memo("button.fontsize", () => this.ui.buttonGroup([this.button({
                                                className: "dropdown-toggle",
                                                contents: this.ui.dropdownButtonContents('<span class="note-current-fontsize"/>', this.options),
                                                tooltip: this.lang.font.size,
                                                data: {
                                                    toggle: "dropdown"
                                                }
                                            }), this.ui.dropdownCheck({
                                                className: "dropdown-fontsize",
                                                checkClassName: this.options.icons.menuCheck,
                                                items: this.options.fontSizes,
                                                title: this.lang.font.size,
                                                click: this.context.createInvokeHandlerAndUpdateState("editor.fontSize")
                                            })]).render()), this.context.memo("button.color", () => this.colorPalette("note-color-all", this.lang.color.recent, !0, !0)), this.context.memo("button.forecolor", () => this.colorPalette("note-color-fore", this.lang.color.foreground, !1, !0)), this.context.memo("button.backcolor", () => this.colorPalette("note-color-back", this.lang.color.background, !0, !1)), this.context.memo("button.ul", () => this.button({
                                                contents: this.ui.icon(this.options.icons.unorderedlist),
                                                tooltip: this.lang.lists.unordered + this.representShortcut("insertUnorderedList"),
                                                click: this.context.createInvokeHandler("editor.insertUnorderedList")
                                            }).render()), this.context.memo("button.ol", () => this.button({
                                                contents: this.ui.icon(this.options.icons.orderedlist),
                                                tooltip: this.lang.lists.ordered + this.representShortcut("insertOrderedList"),
                                                click: this.context.createInvokeHandler("editor.insertOrderedList")
                                            }).render());
                                            const t = this.button({
                                                    contents: this.ui.icon(this.options.icons.alignLeft),
                                                    tooltip: this.lang.paragraph.left + this.representShortcut("justifyLeft"),
                                                    click: this.context.createInvokeHandler("editor.justifyLeft")
                                                }),
                                                e = this.button({
                                                    contents: this.ui.icon(this.options.icons.alignCenter),
                                                    tooltip: this.lang.paragraph.center + this.representShortcut("justifyCenter"),
                                                    click: this.context.createInvokeHandler("editor.justifyCenter")
                                                }),
                                                o = this.button({
                                                    contents: this.ui.icon(this.options.icons.alignRight),
                                                    tooltip: this.lang.paragraph.right + this.representShortcut("justifyRight"),
                                                    click: this.context.createInvokeHandler("editor.justifyRight")
                                                }),
                                                i = this.button({
                                                    contents: this.ui.icon(this.options.icons.alignJustify),
                                                    tooltip: this.lang.paragraph.justify + this.representShortcut("justifyFull"),
                                                    click: this.context.createInvokeHandler("editor.justifyFull")
                                                }),
                                                s = this.button({
                                                    contents: this.ui.icon(this.options.icons.outdent),
                                                    tooltip: this.lang.paragraph.outdent + this.representShortcut("outdent"),
                                                    click: this.context.createInvokeHandler("editor.outdent")
                                                }),
                                                r = this.button({
                                                    contents: this.ui.icon(this.options.icons.indent),
                                                    tooltip: this.lang.paragraph.indent + this.representShortcut("indent"),
                                                    click: this.context.createInvokeHandler("editor.indent")
                                                });
                                            this.context.memo("button.justifyLeft", b.invoke(t, "render")), this.context.memo("button.justifyCenter", b.invoke(e, "render")), this.context.memo("button.justifyRight", b.invoke(o, "render")), this.context.memo("button.justifyFull", b.invoke(i, "render")), this.context.memo("button.outdent", b.invoke(s, "render")), this.context.memo("button.indent", b.invoke(r, "render")), this.context.memo("button.paragraph", () => this.ui.buttonGroup([this.button({
                                                className: "dropdown-toggle",
                                                contents: this.ui.dropdownButtonContents(this.ui.icon(this.options.icons.alignLeft), this.options),
                                                tooltip: this.lang.paragraph.paragraph,
                                                data: {
                                                    toggle: "dropdown"
                                                }
                                            }), this.ui.dropdown([this.ui.buttonGroup({
                                                className: "note-align",
                                                children: [t, e, o, i]
                                            }), this.ui.buttonGroup({
                                                className: "note-list",
                                                children: [s, r]
                                            })])]).render()), this.context.memo("button.height", () => this.ui.buttonGroup([this.button({
                                                className: "dropdown-toggle",
                                                contents: this.ui.dropdownButtonContents(this.ui.icon(this.options.icons.textHeight), this.options),
                                                tooltip: this.lang.font.height,
                                                data: {
                                                    toggle: "dropdown"
                                                }
                                            }), this.ui.dropdownCheck({
                                                items: this.options.lineHeights,
                                                checkClassName: this.options.icons.menuCheck,
                                                className: "dropdown-line-height",
                                                title: this.lang.font.height,
                                                click: this.context.createInvokeHandler("editor.lineHeight")
                                            })]).render()), this.context.memo("button.table", () => this.ui.buttonGroup([this.button({
                                                className: "dropdown-toggle",
                                                contents: this.ui.dropdownButtonContents(this.ui.icon(this.options.icons.table), this.options),
                                                tooltip: this.lang.table.table,
                                                data: {
                                                    toggle: "dropdown"
                                                }
                                            }), this.ui.dropdown({
                                                title: this.lang.table.table,
                                                className: "note-table",
                                                items: ['<div class="note-dimension-picker">', '  <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1"/>', '  <div class="note-dimension-picker-highlighted"/>', '  <div class="note-dimension-picker-unhighlighted"/>', "</div>", '<div class="note-dimension-display">1 x 1</div>'].join("")
                                            })], {
                                                callback: t => {
                                                    t.find(".note-dimension-picker-mousecatcher").css({
                                                        width: this.options.insertTableMaxSize.col + "em",
                                                        height: this.options.insertTableMaxSize.row + "em"
                                                    }).mousedown(this.context.createInvokeHandler("editor.insertTable")).on("mousemove", this.tableMoveHandler.bind(this))
                                                }
                                            }).render()), this.context.memo("button.link", () => this.button({
                                                contents: this.ui.icon(this.options.icons.link),
                                                tooltip: this.lang.link.link + this.representShortcut("linkDialog.show"),
                                                click: this.context.createInvokeHandler("linkDialog.show")
                                            }).render()), this.context.memo("button.picture", () => this.button({
                                                contents: this.ui.icon(this.options.icons.picture),
                                                tooltip: this.lang.image.image,
                                                click: this.context.createInvokeHandler("imageDialog.show")
                                            }).render()), this.context.memo("button.video", () => this.button({
                                                contents: this.ui.icon(this.options.icons.video),
                                                tooltip: this.lang.video.video,
                                                click: this.context.createInvokeHandler("videoDialog.show")
                                            }).render()), this.context.memo("button.hr", () => this.button({
                                                contents: this.ui.icon(this.options.icons.minus),
                                                tooltip: this.lang.hr.insert + this.representShortcut("insertHorizontalRule"),
                                                click: this.context.createInvokeHandler("editor.insertHorizontalRule")
                                            }).render()), this.context.memo("button.fullscreen", () => this.button({
                                                className: "btn-fullscreen",
                                                contents: this.ui.icon(this.options.icons.arrowsAlt),
                                                tooltip: this.lang.options.fullscreen,
                                                click: this.context.createInvokeHandler("fullscreen.toggle")
                                            }).render()), this.context.memo("button.codeview", () => this.button({
                                                className: "btn-codeview",
                                                contents: this.ui.icon(this.options.icons.code),
                                                tooltip: this.lang.options.codeview,
                                                click: this.context.createInvokeHandler("codeview.toggle")
                                            }).render()), this.context.memo("button.redo", () => this.button({
                                                contents: this.ui.icon(this.options.icons.redo),
                                                tooltip: this.lang.history.redo + this.representShortcut("redo"),
                                                click: this.context.createInvokeHandler("editor.redo")
                                            }).render()), this.context.memo("button.undo", () => this.button({
                                                contents: this.ui.icon(this.options.icons.undo),
                                                tooltip: this.lang.history.undo + this.representShortcut("undo"),
                                                click: this.context.createInvokeHandler("editor.undo")
                                            }).render()), this.context.memo("button.help", () => this.button({
                                                contents: this.ui.icon(this.options.icons.question),
                                                tooltip: this.lang.options.help,
                                                click: this.context.createInvokeHandler("helpDialog.show")
                                            }).render())
                                        }
                                        addImagePopoverButtons() {
                                            this.context.memo("button.resizeFull", () => this.button({
                                                contents: '<span class="note-fontsize-10">100%</span>',
                                                tooltip: this.lang.image.resizeFull,
                                                click: this.context.createInvokeHandler("editor.resize", "1")
                                            }).render()), this.context.memo("button.resizeHalf", () => this.button({
                                                contents: '<span class="note-fontsize-10">50%</span>',
                                                tooltip: this.lang.image.resizeHalf,
                                                click: this.context.createInvokeHandler("editor.resize", "0.5")
                                            }).render()), this.context.memo("button.resizeQuarter", () => this.button({
                                                contents: '<span class="note-fontsize-10">25%</span>',
                                                tooltip: this.lang.image.resizeQuarter,
                                                click: this.context.createInvokeHandler("editor.resize", "0.25")
                                            }).render()), this.context.memo("button.resizeNone", () => this.button({
                                                contents: this.ui.icon(this.options.icons.rollback),
                                                tooltip: this.lang.image.resizeNone,
                                                click: this.context.createInvokeHandler("editor.resize", "0")
                                            }).render()), this.context.memo("button.floatLeft", () => this.button({
                                                contents: this.ui.icon(this.options.icons.floatLeft),
                                                tooltip: this.lang.image.floatLeft,
                                                click: this.context.createInvokeHandler("editor.floatMe", "left")
                                            }).render()), this.context.memo("button.floatRight", () => this.button({
                                                contents: this.ui.icon(this.options.icons.floatRight),
                                                tooltip: this.lang.image.floatRight,
                                                click: this.context.createInvokeHandler("editor.floatMe", "right")
                                            }).render()), this.context.memo("button.floatNone", () => this.button({
                                                contents: this.ui.icon(this.options.icons.rollback),
                                                tooltip: this.lang.image.floatNone,
                                                click: this.context.createInvokeHandler("editor.floatMe", "none")
                                            }).render()), this.context.memo("button.removeMedia", () => this.button({
                                                contents: this.ui.icon(this.options.icons.trash),
                                                tooltip: this.lang.image.remove,
                                                click: this.context.createInvokeHandler("editor.removeMedia")
                                            }).render())
                                        }
                                        addLinkPopoverButtons() {
                                            this.context.memo("button.linkDialogShow", () => this.button({
                                                contents: this.ui.icon(this.options.icons.link),
                                                tooltip: this.lang.link.edit,
                                                click: this.context.createInvokeHandler("linkDialog.show")
                                            }).render()), this.context.memo("button.unlink", () => this.button({
                                                contents: this.ui.icon(this.options.icons.unlink),
                                                tooltip: this.lang.link.unlink,
                                                click: this.context.createInvokeHandler("editor.unlink")
                                            }).render())
                                        }
                                        addTablePopoverButtons() {
                                            this.context.memo("button.addRowUp", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.rowAbove),
                                                tooltip: this.lang.table.addRowAbove,
                                                click: this.context.createInvokeHandler("editor.addRow", "top")
                                            }).render()), this.context.memo("button.addRowDown", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.rowBelow),
                                                tooltip: this.lang.table.addRowBelow,
                                                click: this.context.createInvokeHandler("editor.addRow", "bottom")
                                            }).render()), this.context.memo("button.addColLeft", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.colBefore),
                                                tooltip: this.lang.table.addColLeft,
                                                click: this.context.createInvokeHandler("editor.addCol", "left")
                                            }).render()), this.context.memo("button.addColRight", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.colAfter),
                                                tooltip: this.lang.table.addColRight,
                                                click: this.context.createInvokeHandler("editor.addCol", "right")
                                            }).render()), this.context.memo("button.deleteRow", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.rowRemove),
                                                tooltip: this.lang.table.delRow,
                                                click: this.context.createInvokeHandler("editor.deleteRow")
                                            }).render()), this.context.memo("button.deleteCol", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.colRemove),
                                                tooltip: this.lang.table.delCol,
                                                click: this.context.createInvokeHandler("editor.deleteCol")
                                            }).render()), this.context.memo("button.deleteTable", () => this.button({
                                                className: "btn-md",
                                                contents: this.ui.icon(this.options.icons.trash),
                                                tooltip: this.lang.table.delTable,
                                                click: this.context.createInvokeHandler("editor.deleteTable")
                                            }).render())
                                        }
                                        build(t, e) {
                                            for (let o = 0, i = e.length; o < i; o++) {
                                                const i = e[o],
                                                    n = Array.isArray(i) ? i[0] : i,
                                                    s = Array.isArray(i) ? 1 === i.length ? [i[0]] : i[1] : [i],
                                                    r = this.ui.buttonGroup({
                                                        className: "note-" + n
                                                    }).render();
                                                for (let t = 0, e = s.length; t < e; t++) {
                                                    const e = this.context.memo("button." + s[t]);
                                                    e && r.append("function" == typeof e ? e(this.context) : e)
                                                }
                                                r.appendTo(t)
                                            }
                                        }
                                        updateCurrentStyle(t) {
                                            const e = t || this.$toolbar,
                                                o = this.context.invoke("editor.currentStyle");
                                            if (this.updateBtnStates(e, {
                                                    ".note-btn-bold": () => "bold" === o["font-bold"],
                                                    ".note-btn-italic": () => "italic" === o["font-italic"],
                                                    ".note-btn-underline": () => "underline" === o["font-underline"],
                                                    ".note-btn-subscript": () => "subscript" === o["font-subscript"],
                                                    ".note-btn-superscript": () => "superscript" === o["font-superscript"],
                                                    ".note-btn-strikethrough": () => "strikethrough" === o["font-strikethrough"]
                                                }), o["font-family"]) {
                                                const t = o["font-family"].split(",").map(t => t.replace(/[\'\"]/g, "").replace(/\s+$/, "").replace(/^\s+/, "")),
                                                    i = w.find(t, this.isFontInstalled.bind(this));
                                                e.find(".dropdown-fontname a").each((t, e) => {
                                                    const o = n()(e),
                                                        s = o.data("value") + "" == i + "";
                                                    o.toggleClass("checked", s)
                                                }), e.find(".note-current-fontname").text(i).css("font-family", i)
                                            }
                                            if (o["font-size"]) {
                                                const t = o["font-size"];
                                                e.find(".dropdown-fontsize a").each((e, o) => {
                                                    const i = n()(o),
                                                        s = i.data("value") + "" == t + "";
                                                    i.toggleClass("checked", s)
                                                }), e.find(".note-current-fontsize").text(t)
                                            }
                                            if (o["line-height"]) {
                                                const t = o["line-height"];
                                                e.find(".dropdown-line-height li a").each((e, o) => {
                                                    const i = n()(o).data("value") + "" == t + "";
                                                    this.className = i ? "checked" : ""
                                                })
                                            }
                                        }
                                        updateBtnStates(t, e) {
                                            n.a.each(e, (e, o) => {
                                                this.ui.toggleBtnActive(t.find(e), o())
                                            })
                                        }
                                        tableMoveHandler(t) {
                                            const e = n()(t.target.parentNode),
                                                o = e.next(),
                                                i = e.find(".note-dimension-picker-mousecatcher"),
                                                s = e.find(".note-dimension-picker-highlighted"),
                                                r = e.find(".note-dimension-picker-unhighlighted");
                                            let a;
                                            if (void 0 === t.offsetX) {
                                                const e = n()(t.target).offset();
                                                a = {
                                                    x: t.pageX - e.left,
                                                    y: t.pageY - e.top
                                                }
                                            } else a = {
                                                x: t.offsetX,
                                                y: t.offsetY
                                            };
                                            const l = Math.ceil(a.x / 18) || 1,
                                                c = Math.ceil(a.y / 18) || 1;
                                            s.css({
                                                width: l + "em",
                                                height: c + "em"
                                            }), i.data("value", l + "x" + c), l > 3 && l < this.options.insertTableMaxSize.col && r.css({
                                                width: l + 1 + "em"
                                            }), c > 3 && c < this.options.insertTableMaxSize.row && r.css({
                                                height: c + 1 + "em"
                                            }), o.html(l + " x " + c)
                                        }
                                    },
                                    toolbar: class {
                                        constructor(t) {
                                            this.context = t, this.$window = n()(window), this.$document = n()(document), this.ui = n.a.summernote.ui, this.$note = t.layoutInfo.note, this.$editor = t.layoutInfo.editor, this.$toolbar = t.layoutInfo.toolbar, this.$editable = t.layoutInfo.editable, this.$statusbar = t.layoutInfo.statusbar, this.options = t.options, this.isFollowing = !1, this.followScroll = this.followScroll.bind(this)
                                        }
                                        shouldInitialize() {
                                            return !this.options.airMode
                                        }
                                        initialize() {
                                            this.options.toolbar = this.options.toolbar || [], this.options.toolbar.length ? this.context.invoke("buttons.build", this.$toolbar, this.options.toolbar) : this.$toolbar.hide(), this.options.toolbarContainer && this.$toolbar.appendTo(this.options.toolbarContainer), this.changeContainer(!1), this.$note.on("summernote.keyup summernote.mouseup summernote.change", () => {
                                                this.context.invoke("buttons.updateCurrentStyle")
                                            }), this.context.invoke("buttons.updateCurrentStyle"), this.options.followingToolbar && this.$window.on("scroll resize", this.followScroll)
                                        }
                                        destroy() {
                                            this.$toolbar.children().remove(), this.options.followingToolbar && this.$window.off("scroll resize", this.followScroll)
                                        }
                                        followScroll() {
                                            if (this.$editor.hasClass("fullscreen")) return !1;
                                            const t = this.$editor.outerHeight(),
                                                e = this.$editor.width(),
                                                o = this.$toolbar.height(),
                                                i = this.$statusbar.height();
                                            let s = 0;
                                            this.options.otherStaticBar && (s = n()(this.options.otherStaticBar).outerHeight());
                                            const r = this.$document.scrollTop(),
                                                a = this.$editor.offset().top,
                                                l = a - s,
                                                c = a + t - s - o - i;
                                            !this.isFollowing && r > l && r < c - o ? (this.isFollowing = !0, this.$toolbar.css({
                                                position: "fixed",
                                                top: s,
                                                width: e,
                                                zIndex: 1e3
                                            }), this.$editable.css({
                                                marginTop: this.$toolbar.height() + 5
                                            })) : this.isFollowing && (r < l || r > c) && (this.isFollowing = !1, this.$toolbar.css({
                                                position: "relative",
                                                top: 0,
                                                width: "100%",
                                                zIndex: "auto"
                                            }), this.$editable.css({
                                                marginTop: ""
                                            }))
                                        }
                                        changeContainer(t) {
                                            t ? this.$toolbar.prependTo(this.$editor) : this.options.toolbarContainer && this.$toolbar.appendTo(this.options.toolbarContainer), this.followScroll()
                                        }
                                        updateFullscreen(t) {
                                            this.ui.toggleBtnActive(this.$toolbar.find(".btn-fullscreen"), t), this.changeContainer(t)
                                        }
                                        updateCodeview(t) {
                                            this.ui.toggleBtnActive(this.$toolbar.find(".btn-codeview"), t), t ? this.deactivate() : this.activate()
                                        }
                                        activate(t) {
                                            let e = this.$toolbar.find("button");
                                            t || (e = e.not(".btn-codeview")), this.ui.toggleBtn(e, !0)
                                        }
                                        deactivate(t) {
                                            let e = this.$toolbar.find("button");
                                            t || (e = e.not(".btn-codeview")), this.ui.toggleBtn(e, !1)
                                        }
                                    },
                                    linkDialog: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.$body = n()(document.body), this.$editor = t.layoutInfo.editor, this.options = t.options, this.lang = this.options.langInfo, t.memo("help.linkDialog.show", this.options.langInfo.help["linkDialog.show"])
                                        }
                                        initialize() {
                                            const t = this.options.dialogsInBody ? this.$body : this.$editor,
                                                e = ['<div class="form-group note-form-group">', `<label class="note-form-label">${this.lang.link.textToDisplay}</label>`, '<input class="note-link-text form-control note-form-control note-input" type="text" />', "</div>", '<div class="form-group note-form-group">', `<label class="note-form-label">${this.lang.link.url}</label>`, '<input class="note-link-url form-control note-form-control note-input" type="text" value="http://" />', "</div>", this.options.disableLinkTarget ? "" : n()("<div/>").append(this.ui.checkbox({
                                                    className: "sn-checkbox-open-in-new-window",
                                                    text: this.lang.link.openInNewWindow,
                                                    checked: !0
                                                }).render()).html()].join(""),
                                                o = `<input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="${this.lang.link.insert}" disabled>`;
                                            this.$dialog = this.ui.dialog({
                                                className: "link-dialog",
                                                title: this.lang.link.insert,
                                                fade: this.options.dialogsFade,
                                                body: e,
                                                footer: o
                                            }).render().appendTo(t)
                                        }
                                        destroy() {
                                            this.ui.hideDialog(this.$dialog), this.$dialog.remove()
                                        }
                                        bindEnterKey(t, e) {
                                            t.on("keypress", t => {
                                                t.keyCode === Ct.code.ENTER && (t.preventDefault(), e.trigger("click"))
                                            })
                                        }
                                        toggleLinkBtn(t, e, o) {
                                            this.ui.toggleBtn(t, e.val() && o.val())
                                        }
                                        showLinkDialog(t) {
                                            return n.a.Deferred(e => {
                                                const o = this.$dialog.find(".note-link-text"),
                                                    i = this.$dialog.find(".note-link-url"),
                                                    n = this.$dialog.find(".note-link-btn"),
                                                    s = this.$dialog.find(".sn-checkbox-open-in-new-window input[type=checkbox]");
                                                this.ui.onDialogShown(this.$dialog, () => {
                                                    this.context.triggerEvent("dialog.shown"), !t.url && b.isValidUrl(t.text) && (t.url = t.text), o.on("input paste propertychange", () => {
                                                        t.text = o.val(), this.toggleLinkBtn(n, o, i)
                                                    }).val(t.text), i.on("input paste propertychange", () => {
                                                        t.text || o.val(i.val()), this.toggleLinkBtn(n, o, i)
                                                    }).val(t.url), f.isSupportTouch || i.trigger("focus"), this.toggleLinkBtn(n, o, i), this.bindEnterKey(i, n), this.bindEnterKey(o, n);
                                                    const r = void 0 !== t.isNewWindow ? t.isNewWindow : this.context.options.linkTargetBlank;
                                                    s.prop("checked", r), n.one("click", n => {
                                                        n.preventDefault(), e.resolve({
                                                            range: t.range,
                                                            url: i.val(),
                                                            text: o.val(),
                                                            isNewWindow: s.is(":checked")
                                                        }), this.ui.hideDialog(this.$dialog)
                                                    })
                                                }), this.ui.onDialogHidden(this.$dialog, () => {
                                                    o.off(), i.off(), n.off(), "pending" === e.state() && e.reject()
                                                }), this.ui.showDialog(this.$dialog)
                                            }).promise()
                                        }
                                        show() {
                                            const t = this.context.invoke("editor.getLinkInfo");
                                            this.context.invoke("editor.saveRange"), this.showLinkDialog(t).then(t => {
                                                this.context.invoke("editor.restoreRange"), this.context.invoke("editor.createLink", t)
                                            }).fail(() => {
                                                this.context.invoke("editor.restoreRange")
                                            })
                                        }
                                    },
                                    linkPopover: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.options = t.options, this.events = {
                                                "summernote.keyup summernote.mouseup summernote.change summernote.scroll": () => {
                                                    this.update()
                                                },
                                                "summernote.disable summernote.dialog.shown": () => {
                                                    this.hide()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return !w.isEmpty(this.options.popover.link)
                                        }
                                        initialize() {
                                            this.$popover = this.ui.popover({
                                                className: "note-link-popover",
                                                callback: t => {
                                                    t.find(".popover-content,.note-popover-content").prepend('<span><a target="_blank"></a>&nbsp;</span>')
                                                }
                                            }).render().appendTo(this.options.container);
                                            const t = this.$popover.find(".popover-content,.note-popover-content");
                                            this.context.invoke("buttons.build", t, this.options.popover.link)
                                        }
                                        destroy() {
                                            this.$popover.remove()
                                        }
                                        update() {
                                            if (!this.context.invoke("editor.hasFocus")) return void this.hide();
                                            const t = this.context.invoke("editor.getLastRange");
                                            if (t.isCollapsed() && t.isOnAnchor()) {
                                                const e = pt.ancestor(t.sc, pt.isAnchor),
                                                    o = n()(e).attr("href");
                                                this.$popover.find("a").attr("href", o).html(o);
                                                const i = pt.posFromPlaceholder(e);
                                                this.$popover.css({
                                                    display: "block",
                                                    left: i.left,
                                                    top: i.top
                                                })
                                            } else this.hide()
                                        }
                                        hide() {
                                            this.$popover.hide()
                                        }
                                    },
                                    imageDialog: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.$body = n()(document.body), this.$editor = t.layoutInfo.editor, this.options = t.options, this.lang = this.options.langInfo
                                        }
                                        initialize() {
                                            const t = this.options.dialogsInBody ? this.$body : this.$editor;
                                            let e = "";
                                            if (this.options.maximumImageFileSize) {
                                                const t = Math.floor(Math.log(this.options.maximumImageFileSize) / Math.log(1024)),
                                                    o = 1 * (this.options.maximumImageFileSize / Math.pow(1024, t)).toFixed(2) + " " + " KMGTP" [t] + "B";
                                                e = `<small>${this.lang.image.maximumFileSize+" : "+o}</small>`
                                            }
                                            const o = ['<div class="form-group note-form-group note-group-select-from-files">', '<label class="note-form-label">' + this.lang.image.selectFromFiles + "</label>", '<input class="note-image-input form-control-file note-form-control note-input" ', ' type="file" name="files" accept="image/*" multiple="multiple" />', e, "</div>", '<div class="form-group note-group-image-url" style="overflow:auto;">', '<label class="note-form-label">' + this.lang.image.url + "</label>", '<input class="note-image-url form-control note-form-control note-input ', ' col-md-12" type="text" />', "</div>"].join(""),
                                                i = `<input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="${this.lang.image.insert}" disabled>`;
                                            this.$dialog = this.ui.dialog({
                                                title: this.lang.image.insert,
                                                fade: this.options.dialogsFade,
                                                body: o,
                                                footer: i
                                            }).render().appendTo(t)
                                        }
                                        destroy() {
                                            this.ui.hideDialog(this.$dialog), this.$dialog.remove()
                                        }
                                        bindEnterKey(t, e) {
                                            t.on("keypress", t => {
                                                t.keyCode === Ct.code.ENTER && (t.preventDefault(), e.trigger("click"))
                                            })
                                        }
                                        show() {
                                            this.context.invoke("editor.saveRange"), this.showImageDialog().then(t => {
                                                this.ui.hideDialog(this.$dialog), this.context.invoke("editor.restoreRange"), "string" == typeof t ? this.options.callbacks.onImageLinkInsert ? this.context.triggerEvent("image.link.insert", t) : this.context.invoke("editor.insertImage", t) : this.context.invoke("editor.insertImagesOrCallback", t)
                                            }).fail(() => {
                                                this.context.invoke("editor.restoreRange")
                                            })
                                        }
                                        showImageDialog() {
                                            return n.a.Deferred(t => {
                                                const e = this.$dialog.find(".note-image-input"),
                                                    o = this.$dialog.find(".note-image-url"),
                                                    i = this.$dialog.find(".note-image-btn");
                                                this.ui.onDialogShown(this.$dialog, () => {
                                                    this.context.triggerEvent("dialog.shown"), e.replaceWith(e.clone().on("change", e => {
                                                        t.resolve(e.target.files || e.target.value)
                                                    }).val("")), o.on("input paste propertychange", () => {
                                                        this.ui.toggleBtn(i, o.val())
                                                    }).val(""), f.isSupportTouch || o.trigger("focus"), i.click(e => {
                                                        e.preventDefault(), t.resolve(o.val())
                                                    }), this.bindEnterKey(o, i)
                                                }), this.ui.onDialogHidden(this.$dialog, () => {
                                                    e.off(), o.off(), i.off(), "pending" === t.state() && t.reject()
                                                }), this.ui.showDialog(this.$dialog)
                                            })
                                        }
                                    },
                                    imagePopover: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.editable = t.layoutInfo.editable[0], this.options = t.options, this.events = {
                                                "summernote.disable": () => {
                                                    this.hide()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return !w.isEmpty(this.options.popover.image)
                                        }
                                        initialize() {
                                            this.$popover = this.ui.popover({
                                                className: "note-image-popover"
                                            }).render().appendTo(this.options.container);
                                            const t = this.$popover.find(".popover-content,.note-popover-content");
                                            this.context.invoke("buttons.build", t, this.options.popover.image)
                                        }
                                        destroy() {
                                            this.$popover.remove()
                                        }
                                        update(t, e) {
                                            if (pt.isImg(t)) {
                                                const o = pt.posFromPlaceholder(t),
                                                    i = pt.posFromPlaceholder(this.editable);
                                                this.$popover.css({
                                                    display: "block",
                                                    left: this.options.popatmouse ? e.pageX - 20 : o.left,
                                                    top: this.options.popatmouse ? e.pageY : Math.min(o.top, i.top)
                                                })
                                            } else this.hide()
                                        }
                                        hide() {
                                            this.$popover.hide()
                                        }
                                    },
                                    tablePopover: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.options = t.options, this.events = {
                                                "summernote.mousedown": (t, e) => {
                                                    this.update(e.target)
                                                },
                                                "summernote.keyup summernote.scroll summernote.change": () => {
                                                    this.update()
                                                },
                                                "summernote.disable": () => {
                                                    this.hide()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return !w.isEmpty(this.options.popover.table)
                                        }
                                        initialize() {
                                            this.$popover = this.ui.popover({
                                                className: "note-table-popover"
                                            }).render().appendTo(this.options.container);
                                            const t = this.$popover.find(".popover-content,.note-popover-content");
                                            this.context.invoke("buttons.build", t, this.options.popover.table), f.isFF && document.execCommand("enableInlineTableEditing", !1, !1)
                                        }
                                        destroy() {
                                            this.$popover.remove()
                                        }
                                        update(t) {
                                            if (this.context.isDisabled()) return !1;
                                            const e = pt.isCell(t);
                                            if (e) {
                                                const e = pt.posFromPlaceholder(t);
                                                this.$popover.css({
                                                    display: "block",
                                                    left: e.left,
                                                    top: e.top
                                                })
                                            } else this.hide();
                                            return e
                                        }
                                        hide() {
                                            this.$popover.hide()
                                        }
                                    },
                                    videoDialog: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.$body = n()(document.body), this.$editor = t.layoutInfo.editor, this.options = t.options, this.lang = this.options.langInfo
                                        }
                                        initialize() {
                                            const t = this.options.dialogsInBody ? this.$body : this.$editor,
                                                e = ['<div class="form-group note-form-group row-fluid">', `<label class="note-form-label">${this.lang.video.url} <small class="text-muted">${this.lang.video.providers}</small></label>`, '<input class="note-video-url form-control note-form-control note-input" type="text" />', "</div>"].join(""),
                                                o = `<input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="${this.lang.video.insert}" disabled>`;
                                            this.$dialog = this.ui.dialog({
                                                title: this.lang.video.insert,
                                                fade: this.options.dialogsFade,
                                                body: e,
                                                footer: o
                                            }).render().appendTo(t)
                                        }
                                        destroy() {
                                            this.ui.hideDialog(this.$dialog), this.$dialog.remove()
                                        }
                                        bindEnterKey(t, e) {
                                            t.on("keypress", t => {
                                                t.keyCode === Ct.code.ENTER && (t.preventDefault(), e.trigger("click"))
                                            })
                                        }
                                        createVideoNode(t) {
                                            const e = /^(?:(\d+)h)?(?:(\d+)m)?(?:(\d+)s)?$/,
                                                o = t.match(/\/\/(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w|-]{11})(?:(?:[\?&]t=)(\S+))?$/),
                                                i = t.match(/(?:www\.|\/\/)instagram\.com\/p\/(.[a-zA-Z0-9_-]*)/),
                                                s = t.match(/\/\/vine\.co\/v\/([a-zA-Z0-9]+)/),
                                                r = t.match(/\/\/(player\.)?vimeo\.com\/([a-z]*\/)*(\d+)[?]?.*/),
                                                a = t.match(/.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/),
                                                l = t.match(/\/\/v\.youku\.com\/v_show\/id_(\w+)=*\.html/),
                                                c = t.match(/\/\/v\.qq\.com.*?vid=(.+)/),
                                                h = t.match(/\/\/v\.qq\.com\/x?\/?(page|cover).*?\/([^\/]+)\.html\??.*/),
                                                d = t.match(/^.+.(mp4|m4v)$/),
                                                u = t.match(/^.+.(ogg|ogv)$/),
                                                p = t.match(/^.+.(webm)$/),
                                                m = t.match(/(?:www\.|\/\/)facebook\.com\/([^\/]+)\/videos\/([0-9]+)/);
                                            let f;
                                            if (o && 11 === o[1].length) {
                                                const t = o[1];
                                                var g = 0;
                                                if (void 0 !== o[2]) {
                                                    const t = o[2].match(e);
                                                    if (t)
                                                        for (var b = [3600, 60, 1], v = 0, k = b.length; v < k; v++) g += void 0 !== t[v + 1] ? b[v] * parseInt(t[v + 1], 10) : 0
                                                }
                                                f = n()("<iframe>").attr("frameborder", 0).attr("src", "//www.youtube.com/embed/" + t + (g > 0 ? "?start=" + g : "")).attr("width", "640").attr("height", "360")
                                            } else if (i && i[0].length) f = n()("<iframe>").attr("frameborder", 0).attr("src", "https://instagram.com/p/" + i[1] + "/embed/").attr("width", "612").attr("height", "710").attr("scrolling", "no").attr("allowtransparency", "true");
                                            else if (s && s[0].length) f = n()("<iframe>").attr("frameborder", 0).attr("src", s[0] + "/embed/simple").attr("width", "600").attr("height", "600").attr("class", "vine-embed");
                                            else if (r && r[3].length) f = n()("<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>").attr("frameborder", 0).attr("src", "//player.vimeo.com/video/" + r[3]).attr("width", "640").attr("height", "360");
                                            else if (a && a[2].length) f = n()("<iframe>").attr("frameborder", 0).attr("src", "//www.dailymotion.com/embed/video/" + a[2]).attr("width", "640").attr("height", "360");
                                            else if (l && l[1].length) f = n()("<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>").attr("frameborder", 0).attr("height", "498").attr("width", "510").attr("src", "//player.youku.com/embed/" + l[1]);
                                            else if (c && c[1].length || h && h[2].length) {
                                                const t = c && c[1].length ? c[1] : h[2];
                                                f = n()("<iframe webkitallowfullscreen mozallowfullscreen allowfullscreen>").attr("frameborder", 0).attr("height", "310").attr("width", "500").attr("src", "http://v.qq.com/iframe/player.html?vid=" + t + "&amp;auto=0")
                                            } else if (d || u || p) f = n()("<video controls>").attr("src", t).attr("width", "640").attr("height", "360");
                                            else {
                                                if (!m || !m[0].length) return !1;
                                                f = n()("<iframe>").attr("frameborder", 0).attr("src", "https://www.facebook.com/plugins/video.php?href=" + encodeURIComponent(m[0]) + "&show_text=0&width=560").attr("width", "560").attr("height", "301").attr("scrolling", "no").attr("allowtransparency", "true")
                                            }
                                            return f.addClass("note-video-clip"), f[0]
                                        }
                                        show() {
                                            const t = this.context.invoke("editor.getSelectedText");
                                            this.context.invoke("editor.saveRange"), this.showVideoDialog(t).then(t => {
                                                this.ui.hideDialog(this.$dialog), this.context.invoke("editor.restoreRange");
                                                const e = this.createVideoNode(t);
                                                e && this.context.invoke("editor.insertNode", e)
                                            }).fail(() => {
                                                this.context.invoke("editor.restoreRange")
                                            })
                                        }
                                        showVideoDialog(t) {
                                            return n.a.Deferred(t => {
                                                const e = this.$dialog.find(".note-video-url"),
                                                    o = this.$dialog.find(".note-video-btn");
                                                this.ui.onDialogShown(this.$dialog, () => {
                                                    this.context.triggerEvent("dialog.shown"), e.on("input paste propertychange", () => {
                                                        this.ui.toggleBtn(o, e.val())
                                                    }), f.isSupportTouch || e.trigger("focus"), o.click(o => {
                                                        o.preventDefault(), t.resolve(e.val())
                                                    }), this.bindEnterKey(e, o)
                                                }), this.ui.onDialogHidden(this.$dialog, () => {
                                                    e.off(), o.off(), "pending" === t.state() && t.reject()
                                                }), this.ui.showDialog(this.$dialog)
                                            })
                                        }
                                    },
                                    helpDialog: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.$body = n()(document.body), this.$editor = t.layoutInfo.editor, this.options = t.options, this.lang = this.options.langInfo
                                        }
                                        initialize() {
                                            const t = this.options.dialogsInBody ? this.$body : this.$editor,
                                                e = ['<p class="text-center">', '<a href="http://summernote.org/" target="_blank">Summernote 0.8.12</a> · ', '<a href="https://github.com/summernote/summernote" target="_blank">Project</a> · ', '<a href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a>', "</p>"].join("");
                                            this.$dialog = this.ui.dialog({
                                                title: this.lang.options.help,
                                                fade: this.options.dialogsFade,
                                                body: this.createShortcutList(),
                                                footer: e,
                                                callback: t => {
                                                    t.find(".modal-body,.note-modal-body").css({
                                                        "max-height": 800,
                                                        overflow: "scroll"
                                                    })
                                                }
                                            }).render().appendTo(t)
                                        }
                                        destroy() {
                                            this.ui.hideDialog(this.$dialog), this.$dialog.remove()
                                        }
                                        createShortcutList() {
                                            const t = this.options.keyMap[f.isMac ? "mac" : "pc"];
                                            return Object.keys(t).map(e => {
                                                const o = t[e],
                                                    i = n()('<div><div class="help-list-item"/></div>');
                                                return i.append(n()("<label><kbd>" + e + "</kdb></label>").css({
                                                    width: 180,
                                                    "margin-right": 10
                                                })).append(n()("<span/>").html(this.context.memo("help." + o) || o)), i.html()
                                            }).join("")
                                        }
                                        showHelpDialog() {
                                            return n.a.Deferred(t => {
                                                this.ui.onDialogShown(this.$dialog, () => {
                                                    this.context.triggerEvent("dialog.shown"), t.resolve()
                                                }), this.ui.showDialog(this.$dialog)
                                            }).promise()
                                        }
                                        show() {
                                            this.context.invoke("editor.saveRange"), this.showHelpDialog().then(() => {
                                                this.context.invoke("editor.restoreRange")
                                            })
                                        }
                                    },
                                    airPopover: class {
                                        constructor(t) {
                                            this.context = t, this.ui = n.a.summernote.ui, this.options = t.options, this.events = {
                                                "summernote.keyup summernote.mouseup summernote.scroll": () => {
                                                    this.update()
                                                },
                                                "summernote.disable summernote.change summernote.dialog.shown": () => {
                                                    this.hide()
                                                },
                                                "summernote.focusout": (t, e) => {
                                                    f.isFF || f.isSafari || e.relatedTarget && pt.ancestor(e.relatedTarget, b.eq(this.$popover[0])) || this.hide()
                                                }
                                            }
                                        }
                                        shouldInitialize() {
                                            return this.options.airMode && !w.isEmpty(this.options.popover.air)
                                        }
                                        initialize() {
                                            this.$popover = this.ui.popover({
                                                className: "note-air-popover"
                                            }).render().appendTo(this.options.container);
                                            const t = this.$popover.find(".popover-content");
                                            this.context.invoke("buttons.build", t, this.options.popover.air)
                                        }
                                        destroy() {
                                            this.$popover.remove()
                                        }
                                        update() {
                                            const t = this.context.invoke("editor.currentStyle");
                                            if (t.range && !t.range.isCollapsed()) {
                                                const e = w.last(t.range.getClientRects());
                                                if (e) {
                                                    const t = b.rect2bnd(e);
                                                    this.$popover.css({
                                                        display: "block",
                                                        left: Math.max(t.left + t.width / 2, 0) - At,
                                                        top: t.top + t.height
                                                    }), this.context.invoke("buttons.updateCurrentStyle", this.$popover)
                                                }
                                            } else this.hide()
                                        }
                                        hide() {
                                            this.$popover.hide()
                                        }
                                    }
                                },
                                buttons: {},
                                lang: "en-US",
                                followingToolbar: !1,
                                otherStaticBar: "",
                                toolbar: [
                                    ["style", ["style"]],
                                    ["font", ["bold", "underline", "clear"]],
                                    ["fontname", ["fontname"]],
                                    ["color", ["color"]],
                                    ["para", ["ul", "ol", "paragraph"]],
                                    ["table", ["table"]],
                                    ["insert", ["link", "picture", "video"]],
                                    ["view", ["fullscreen", "codeview", "help"]]
                                ],
                                popatmouse: !0,
                                popover: {
                                    image: [
                                        ["resize", ["resizeFull", "resizeHalf", "resizeQuarter", "resizeNone"]],
                                        ["float", ["floatLeft", "floatRight", "floatNone"]],
                                        ["remove", ["removeMedia"]]
                                    ],
                                    link: [
                                        ["link", ["linkDialogShow", "unlink"]]
                                    ],
                                    table: [
                                        ["add", ["addRowDown", "addRowUp", "addColLeft", "addColRight"]],
                                        ["delete", ["deleteRow", "deleteCol", "deleteTable"]]
                                    ],
                                    air: [
                                        ["color", ["color"]],
                                        ["font", ["bold", "underline", "clear"]],
                                        ["para", ["ul", "paragraph"]],
                                        ["table", ["table"]],
                                        ["insert", ["link", "picture"]]
                                    ]
                                },
                                airMode: !1,
                                width: null,
                                height: null,
                                linkTargetBlank: !0,
                                focus: !1,
                                tabSize: 4,
                                styleWithSpan: !0,
                                shortcuts: !0,
                                textareaAutoSync: !0,
                                hintDirection: "bottom",
                                tooltip: "auto",
                                container: "body",
                                maxTextLength: 0,
                                blockquoteBreakingLevel: 2,
                                spellCheck: !0,
                                placeholder: null,
                                inheritPlaceholder: !1,
                                styleTags: ["p", "blockquote", "pre", "h1", "h2", "h3", "h4", "h5", "h6"],
                                fontNames: ["Arial", "Arial Black", "Comic Sans MS", "Courier New", "Helvetica Neue", "Helvetica", "Impact", "Lucida Grande", "Tahoma", "Times New Roman", "Verdana"],
                                fontNamesIgnoreCheck: [],
                                addDefaultFonts: !0,
                                fontSizes: ["8", "9", "10", "11", "12", "14", "18", "24", "36"],
                                colors: [
                                    ["#000000", "#424242", "#636363", "#9C9C94", "#CEC6CE", "#EFEFEF", "#F7F7F7", "#FFFFFF"],
                                    ["#FF0000", "#FF9C00", "#FFFF00", "#00FF00", "#00FFFF", "#0000FF", "#9C00FF", "#FF00FF"],
                                    ["#F7C6CE", "#FFE7CE", "#FFEFC6", "#D6EFD6", "#CEDEE7", "#CEE7F7", "#D6D6E7", "#E7D6DE"],
                                    ["#E79C9C", "#FFC69C", "#FFE79C", "#B5D6A5", "#A5C6CE", "#9CC6EF", "#B5A5D6", "#D6A5BD"],
                                    ["#E76363", "#F7AD6B", "#FFD663", "#94BD7B", "#73A5AD", "#6BADDE", "#8C7BC6", "#C67BA5"],
                                    ["#CE0000", "#E79439", "#EFC631", "#6BA54A", "#4A7B8C", "#3984C6", "#634AA5", "#A54A7B"],
                                    ["#9C0000", "#B56308", "#BD9400", "#397B21", "#104A5A", "#085294", "#311873", "#731842"],
                                    ["#630000", "#7B3900", "#846300", "#295218", "#083139", "#003163", "#21104A", "#4A1031"]
                                ],
                                colorsName: [
                                    ["Black", "Tundora", "Dove Gray", "Star Dust", "Pale Slate", "Gallery", "Alabaster", "White"],
                                    ["Red", "Orange Peel", "Yellow", "Green", "Cyan", "Blue", "Electric Violet", "Magenta"],
                                    ["Azalea", "Karry", "Egg White", "Zanah", "Botticelli", "Tropical Blue", "Mischka", "Twilight"],
                                    ["Tonys Pink", "Peach Orange", "Cream Brulee", "Sprout", "Casper", "Perano", "Cold Purple", "Careys Pink"],
                                    ["Mandy", "Rajah", "Dandelion", "Olivine", "Gulf Stream", "Viking", "Blue Marguerite", "Puce"],
                                    ["Guardsman Red", "Fire Bush", "Golden Dream", "Chelsea Cucumber", "Smalt Blue", "Boston Blue", "Butterfly Bush", "Cadillac"],
                                    ["Sangria", "Mai Tai", "Buddha Gold", "Forest Green", "Eden", "Venice Blue", "Meteorite", "Claret"],
                                    ["Rosewood", "Cinnamon", "Olive", "Parsley", "Tiber", "Midnight Blue", "Valentino", "Loulou"]
                                ],
                                colorButton: {
                                    foreColor: "#000000",
                                    backColor: "#FFFF00"
                                },
                                lineHeights: ["1.0", "1.2", "1.4", "1.5", "1.6", "1.8", "2.0", "3.0"],
                                tableClassName: "table table-bordered",
                                insertTableMaxSize: {
                                    col: 10,
                                    row: 10
                                },
                                dialogsInBody: !1,
                                dialogsFade: !1,
                                maximumImageFileSize: null,
                                callbacks: {
                                    onBeforeCommand: null,
                                    onBlur: null,
                                    onBlurCodeview: null,
                                    onChange: null,
                                    onChangeCodeview: null,
                                    onDialogShown: null,
                                    onEnter: null,
                                    onFocus: null,
                                    onImageLinkInsert: null,
                                    onImageUpload: null,
                                    onImageUploadError: null,
                                    onInit: null,
                                    onKeydown: null,
                                    onKeyup: null,
                                    onMousedown: null,
                                    onMouseup: null,
                                    onPaste: null,
                                    onScroll: null
                                },
                                codemirror: {
                                    mode: "text/html",
                                    htmlMode: !0,
                                    lineNumbers: !0
                                },
                                codeviewFilter: !1,
                                codeviewFilterRegex: /<\/*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|ilayer|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|t(?:itle|extarea)|xml)[^>]*?>/gi,
                                codeviewIframeFilter: !0,
                                codeviewIframeWhitelistSrc: [],
                                codeviewIframeWhitelistSrcBase: ["www.youtube.com", "www.youtube-nocookie.com", "www.facebook.com", "vine.co", "instagram.com", "player.vimeo.com", "www.dailymotion.com", "player.youku.com", "v.qq.com"],
                                keyMap: {
                                    pc: {
                                        ENTER: "insertParagraph",
                                        "CTRL+Z": "undo",
                                        "CTRL+Y": "redo",
                                        TAB: "tab",
                                        "SHIFT+TAB": "untab",
                                        "CTRL+B": "bold",
                                        "CTRL+I": "italic",
                                        "CTRL+U": "underline",
                                        "CTRL+SHIFT+S": "strikethrough",
                                        "CTRL+BACKSLASH": "removeFormat",
                                        "CTRL+SHIFT+L": "justifyLeft",
                                        "CTRL+SHIFT+E": "justifyCenter",
                                        "CTRL+SHIFT+R": "justifyRight",
                                        "CTRL+SHIFT+J": "justifyFull",
                                        "CTRL+SHIFT+NUM7": "insertUnorderedList",
                                        "CTRL+SHIFT+NUM8": "insertOrderedList",
                                        "CTRL+LEFTBRACKET": "outdent",
                                        "CTRL+RIGHTBRACKET": "indent",
                                        "CTRL+NUM0": "formatPara",
                                        "CTRL+NUM1": "formatH1",
                                        "CTRL+NUM2": "formatH2",
                                        "CTRL+NUM3": "formatH3",
                                        "CTRL+NUM4": "formatH4",
                                        "CTRL+NUM5": "formatH5",
                                        "CTRL+NUM6": "formatH6",
                                        "CTRL+ENTER": "insertHorizontalRule",
                                        "CTRL+K": "linkDialog.show"
                                    },
                                    mac: {
                                        ENTER: "insertParagraph",
                                        "CMD+Z": "undo",
                                        "CMD+SHIFT+Z": "redo",
                                        TAB: "tab",
                                        "SHIFT+TAB": "untab",
                                        "CMD+B": "bold",
                                        "CMD+I": "italic",
                                        "CMD+U": "underline",
                                        "CMD+SHIFT+S": "strikethrough",
                                        "CMD+BACKSLASH": "removeFormat",
                                        "CMD+SHIFT+L": "justifyLeft",
                                        "CMD+SHIFT+E": "justifyCenter",
                                        "CMD+SHIFT+R": "justifyRight",
                                        "CMD+SHIFT+J": "justifyFull",
                                        "CMD+SHIFT+NUM7": "insertUnorderedList",
                                        "CMD+SHIFT+NUM8": "insertOrderedList",
                                        "CMD+LEFTBRACKET": "outdent",
                                        "CMD+RIGHTBRACKET": "indent",
                                        "CMD+NUM0": "formatPara",
                                        "CMD+NUM1": "formatH1",
                                        "CMD+NUM2": "formatH2",
                                        "CMD+NUM3": "formatH3",
                                        "CMD+NUM4": "formatH4",
                                        "CMD+NUM5": "formatH5",
                                        "CMD+NUM6": "formatH6",
                                        "CMD+ENTER": "insertHorizontalRule",
                                        "CMD+K": "linkDialog.show"
                                    }
                                },
                                icons: {
                                    align: "note-icon-align",
                                    alignCenter: "note-icon-align-center",
                                    alignJustify: "note-icon-align-justify",
                                    alignLeft: "note-icon-align-left",
                                    alignRight: "note-icon-align-right",
                                    rowBelow: "note-icon-row-below",
                                    colBefore: "note-icon-col-before",
                                    colAfter: "note-icon-col-after",
                                    rowAbove: "note-icon-row-above",
                                    rowRemove: "note-icon-row-remove",
                                    colRemove: "note-icon-col-remove",
                                    indent: "note-icon-align-indent",
                                    outdent: "note-icon-align-outdent",
                                    arrowsAlt: "note-icon-arrows-alt",
                                    bold: "note-icon-bold",
                                    caret: "note-icon-caret",
                                    circle: "note-icon-circle",
                                    close: "note-icon-close",
                                    code: "note-icon-code",
                                    eraser: "note-icon-eraser",
                                    floatLeft: "note-icon-float-left",
                                    floatRight: "note-icon-float-right",
                                    font: "note-icon-font",
                                    frame: "note-icon-frame",
                                    italic: "note-icon-italic",
                                    link: "note-icon-link",
                                    unlink: "note-icon-chain-broken",
                                    magic: "note-icon-magic",
                                    menuCheck: "note-icon-menu-check",
                                    minus: "note-icon-minus",
                                    orderedlist: "note-icon-orderedlist",
                                    pencil: "note-icon-pencil",
                                    picture: "note-icon-picture",
                                    question: "note-icon-question",
                                    redo: "note-icon-redo",
                                    rollback: "note-icon-rollback",
                                    square: "note-icon-square",
                                    strikethrough: "note-icon-strikethrough",
                                    subscript: "note-icon-subscript",
                                    superscript: "note-icon-superscript",
                                    table: "note-icon-table",
                                    textHeight: "note-icon-text-height",
                                    trash: "note-icon-trash",
                                    underline: "note-icon-underline",
                                    undo: "note-icon-undo",
                                    unorderedlist: "note-icon-unorderedlist",
                                    video: "note-icon-video"
                                }
                            }
                        })
                    },
                    5: function(t, e, o) {},
                    52: function(t, e, o) {
                        "use strict";
                        o.r(e);
                        var i = o(0),
                            n = o.n(i),
                            s = o(1);
                        const r = s.a.create('<div class="note-editor note-frame card"/>'),
                            a = s.a.create('<div class="note-toolbar card-header" role="toolbar"></div>'),
                            l = s.a.create('<div class="note-editing-area"/>'),
                            c = s.a.create('<textarea class="note-codable" role="textbox" aria-multiline="true"/>'),
                            h = s.a.create('<div class="note-editable card-block" contentEditable="true" role="textbox" aria-multiline="true"/>'),
                            d = s.a.create(['<output class="note-status-output" aria-live="polite"/>', '<div class="note-statusbar" role="status">', '  <output class="note-status-output" aria-live="polite"></output>', '  <div class="note-resizebar" role="seperator" aria-orientation="horizontal" aria-label="Resize">', '    <div class="note-icon-bar"/>', '    <div class="note-icon-bar"/>', '    <div class="note-icon-bar"/>', "  </div>", "</div>"].join("")),
                            u = s.a.create('<div class="note-editor"/>'),
                            p = s.a.create(['<div class="note-editable" contentEditable="true" role="textbox" aria-multiline="true"/>', '<output class="note-status-output" aria-live="polite"/>'].join("")),
                            m = s.a.create('<div class="note-btn-group btn-group">'),
                            f = s.a.create('<div class="note-dropdown-menu dropdown-menu" role="list">', function(t, e) {
                                const o = Array.isArray(e.items) ? e.items.map(function(t) {
                                    const o = "string" == typeof t ? t : t.value || "",
                                        i = e.template ? e.template(t) : t,
                                        n = "object" == typeof t ? t.option : void 0;
                                    return '<a class="dropdown-item" href="#" ' + ('data-value="' + o + '"' + (void 0 !== n ? ' data-option="' + n + '"' : "")) + ' role="listitem" aria-label="' + o + '">' + i + "</a>"
                                }).join("") : e.items;
                                t.html(o).attr({
                                    "aria-label": e.title
                                })
                            }),
                            g = s.a.create('<div class="note-dropdown-menu dropdown-menu note-check" role="list">', function(t, e) {
                                const o = Array.isArray(e.items) ? e.items.map(function(t) {
                                    const o = "string" == typeof t ? t : t.value || "",
                                        i = e.template ? e.template(t) : t;
                                    return '<a class="dropdown-item" href="#" data-value="' + o + '" role="listitem" aria-label="' + t + '">' + y(e.checkClassName) + " " + i + "</a>"
                                }).join("") : e.items;
                                t.html(o).attr({
                                    "aria-label": e.title
                                })
                            }),
                            b = s.a.create('<div class="note-color-palette"/>', function(t, e) {
                                const o = [];
                                for (let t = 0, i = e.colors.length; t < i; t++) {
                                    const i = e.eventName,
                                        n = e.colors[t],
                                        s = e.colorsName[t],
                                        r = [];
                                    for (let t = 0, e = n.length; t < e; t++) {
                                        const e = n[t],
                                            o = s[t];
                                        r.push(['<button type="button" class="note-color-btn"', 'style="background-color:', e, '" ', 'data-event="', i, '" ', 'data-value="', e, '" ', 'title="', o, '" ', 'aria-label="', o, '" ', 'data-toggle="button" tabindex="-1"></button>'].join(""))
                                    }
                                    o.push('<div class="note-color-row">' + r.join("") + "</div>")
                                }
                                t.html(o.join("")), e.tooltip && t.find(".note-color-btn").tooltip({
                                    container: e.container,
                                    trigger: "hover",
                                    placement: "bottom"
                                })
                            }),
                            v = s.a.create('<div class="modal" aria-hidden="false" tabindex="-1" role="dialog"/>', function(t, e) {
                                e.fade && t.addClass("fade"), t.attr({
                                    "aria-label": e.title
                                }), t.html(['<div class="modal-dialog">', '  <div class="modal-content">', e.title ? '    <div class="modal-header">      <h4 class="modal-title">' + e.title + '</h4>      <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</button>    </div>' : "", '    <div class="modal-body">' + e.body + "</div>", e.footer ? '    <div class="modal-footer">' + e.footer + "</div>" : "", "  </div>", "</div>"].join(""))
                            }),
                            k = s.a.create(['<div class="note-popover popover in">', '  <div class="arrow"/>', '  <div class="popover-content note-children-container"/>', "</div>"].join(""), function(t, e) {
                                const o = void 0 !== e.direction ? e.direction : "bottom";
                                t.addClass(o), e.hideArrow && t.find(".arrow").hide()
                            }),
                            C = s.a.create('<div class="form-check"></div>', function(t, e) {
                                t.html(['<label class="form-check-label"' + (e.id ? ' for="' + e.id + '"' : "") + ">", ' <input role="checkbox" type="checkbox" class="form-check-input"' + (e.id ? ' id="' + e.id + '"' : ""), e.checked ? " checked" : "", ' aria-label="' + (e.text ? e.text : "") + '"', ' aria-checked="' + (e.checked ? "true" : "false") + '"/>', " " + (e.text ? e.text : "") + "</label>"].join(""))
                            }),
                            y = function(t, e) {
                                return "<" + (e = e || "i") + ' class="' + t + '"/>'
                            },
                            w = {
                                editor: r,
                                toolbar: a,
                                editingArea: l,
                                codable: c,
                                editable: h,
                                statusbar: d,
                                airEditor: u,
                                airEditable: p,
                                buttonGroup: m,
                                dropdown: f,
                                dropdownButtonContents: function(t) {
                                    return t
                                },
                                dropdownCheck: g,
                                palette: b,
                                dialog: v,
                                popover: k,
                                icon: y,
                                checkbox: C,
                                options: {},
                                button: function(t, e) {
                                    return s.a.create('<button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1">', function(t, e) {
                                        e && e.tooltip && t.attr({
                                            title: e.tooltip,
                                            "aria-label": e.tooltip
                                        }).tooltip({
                                            container: void 0 !== e.container ? e.container : "body",
                                            trigger: "hover",
                                            placement: "bottom"
                                        }).on("click", t => {
                                            n()(t.currentTarget).tooltip("hide")
                                        })
                                    })(t, e)
                                },
                                toggleBtn: function(t, e) {
                                    t.toggleClass("disabled", !e), t.attr("disabled", !e)
                                },
                                toggleBtnActive: function(t, e) {
                                    t.toggleClass("active", e)
                                },
                                onDialogShown: function(t, e) {
                                    t.one("shown.bs.modal", e)
                                },
                                onDialogHidden: function(t, e) {
                                    t.one("hidden.bs.modal", e)
                                },
                                showDialog: function(t) {
                                    t.modal("show")
                                },
                                hideDialog: function(t) {
                                    t.modal("hide")
                                },
                                createLayout: function(t, e) {
                                    const o = (e.airMode ? w.airEditor([w.editingArea([w.airEditable()])]) : w.editor([w.toolbar(), w.editingArea([w.codable(), w.editable()]), w.statusbar()])).render();
                                    return o.insertAfter(t), {
                                        note: t,
                                        editor: o,
                                        toolbar: o.find(".note-toolbar"),
                                        editingArea: o.find(".note-editing-area"),
                                        editable: o.find(".note-editable"),
                                        codable: o.find(".note-codable"),
                                        statusbar: o.find(".note-statusbar")
                                    }
                                },
                                removeLayout: function(t, e) {
                                    t.html(e.editable.html()), e.editor.remove(), t.show()
                                }
                            };
                        var x = w;
                        o(3), o(5);
                        n.a.summernote = n.a.extend(n.a.summernote, {
                            ui: x
                        }), n.a.summernote.options.styleTags = ["p", {
                            title: "Blockquote",
                            tag: "blockquote",
                            className: "blockquote",
                            value: "blockquote"
                        }, "pre", "h1", "h2", "h3", "h4", "h5", "h6"]
                    }
                })
            });
            //# sourceMappingURL=summernote-bs4.min.js.map


            // ----------------------------------------

            $(document).ready(function() {
                var $editor = $('#summernote1');
                $editor.summernote({
                    placeholder: true,
                    placeholder: 'Write Job Description Here',
                    tabsize: 2,
                    height: 120,
                    width: 1080,
                    focus: true,

                    toolbar: [

                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                /// var text = '';
                // $('#summernote').summernote('pasteHTML', text);
            });


            $(document).ready(function() {
                var $editor = $('#summernote2');
                $editor.summernote({
                    placeholder: true,
                    placeholder: 'Write Job Requirement Here',
                    tabsize: 2,
                    height: 120,
                    width: 1080,
                    focus: true,

                    toolbar: [

                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                /// var text = '';
                // $('#summernote').summernote('pasteHTML', text);
            });


            $(document).ready(function() {
                var $editor = $('#summernote3');
                $editor.summernote({
                    placeholder: true,
                    placeholder: 'Write Job Benefits Here',
                    tabsize: 2,
                    height: 120,
                    width: 1080,
                    focus: true,

                    toolbar: [

                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });


            });

            $(document).ready(function() {
                var jobid = '<?php echo $jobbid ?>';
                //alert(jobid);
                $.ajax({
                    type: 'POST',
                    data: {
                        jobid: jobid
                    },
                    url: '<?php echo site_url('JobsPortal_Controller/jobdetails_requirement'); ?>',
                    success: function(result) {
                        var myresult = JSON.parse(result);
                        $('#summernote2').summernote('code', myresult[0].jobrequirements);
                        $('#summernote3').summernote('code', myresult[0].benefits);
                        $('#summernote1').summernote('code', myresult[0].description);
                    }
                });
            });
        </script>

    </body>

    </html>