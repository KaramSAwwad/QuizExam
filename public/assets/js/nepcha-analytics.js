({
    655: function () {
        var e = this;
        /*! =========================================================
        * Nepcha Analytics v1.0.0
        * Website: https://nepcha.com/
        * Copyright 2023 Nepcha Analytics
        ========================================================= !*/
        !function () {
            var t = window.document.currentScript,
                n = t.getAttribute("info-endpoint") || "".concat(new URL(t.src).origin, "/api/v1/send-event"),
                o = "".concat(new URL(t.src).origin, "/api/v1/update-event"), i = t.getAttribute("info-hash") || !1,
                a = function (e) {
                    return window.location.pathname.match(new RegExp("^".concat(e.trim().replace(/\*\*/g, ".*").replace(/([^\.])\*/g, "$1[^\\s/]*"), "/?$")))
                }, r = function (e, r) {
                    if (/^localhost$|^127(\.[0-9]+){0,2}\.[0-9]+$|^\[::1?\]$/.test(window.location.hostname) || "file:" === window.location.protocol) return console.log("Event ignored due to environment being localhost"), 0;
                    if (window._phantom || window.__nightmare || window.navigator.webdriver || window.Cypress) return console.log("Event ignored due to testing or scraper env"), 0;
                    if ("true" === window.localStorage.ignore_crt_track) return console.log("Event ignored due to rejected track"), 0;
                    var d = t && t.getAttribute("info-append"), c = t && t.getAttribute("info-except");
                    if ("pageview" === e) {
                        var w = !d || d && d.split(",").some(a), s = c && c.split(",").some(a);
                        if (!w || s) return console.log("Event ignored due to exclusion rule applied"), 0
                    }
                    var l = {
                        name: e,
                        location: window.location.href,
                        website: t.getAttribute("data-site"),
                        referrer: window.document.referrer || null,
                        width: window.innerWidth
                    }, u = new XMLHttpRequest;
                    r && r.meta && (l.meta = JSON.stringify(r.meta)), r && r.props && (l.props = r.props), i && (l.hash = 1), u.open("POST", n, !0), u.setRequestHeader("Content-Type", "text/plain"), u.send(JSON.stringify(l)), u.onreadystatechange = function () {
                        4 === u.readyState && r && r.callback && r.callback()
                    }, window.document.addEventListener("DOMContentLoaded", (function () {
                        var e = !1;
                        window.document.addEventListener("keydown", (function (t) {
                            116 === t.keyCode && (e = !0)
                        })), window.document.addEventListener("click", (function (t) {
                            var n = t.target.getAttribute("href");
                            if (n) {
                                var o = new URL(n);
                                o = o.hostname.replace("www.", ""), n && o == l.website && (e = !0)
                            }
                        }), !1), window.onbeforeunload = function () {
                            console.log("test"), e || (console.log("exit"), function (e, t) {
                                var n = new XMLHttpRequest;
                                n.open("POST", o, !0), n.setRequestHeader("Content-Type", "text/plain"), n.send(JSON.stringify(e)), n.onreadystatechange = function () {
                                    4 === n.readyState && t && t.callback && t.callback()
                                }
                            }(l, r))
                        }
                    }))
                }, d = window.ctt && window.ctt.q || [];
            window.ctt = r;
            for (var c = 0; c < d.length; c++) r.apply(e, d[c]);
            var w, s = function () {
                (i || w !== window.location.pathname) && (w = window.location.pathname, r("pageview"))
            };
            if (i) window.addEventListener("hashchange", s); else {
                var l = window.history;
                if (l.pushState) {
                    var u = l.pushState;
                    l.pushState = function () {
                        for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                        u.apply(this, t), s()
                    }, window.addEventListener("popstate", s)
                }
            }
            "prerender" === window.document.visibilityState ? window.document.addEventListener("visibilitychange", (function () {
                w || "visible" !== window.document.visibilityState || s()
            })) : s()
        }()
    }
})[655]();
