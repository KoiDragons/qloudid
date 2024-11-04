! // Self-invocation function declaration

/* Only digits jquery */
function(t) {
	t.fn.onlyDigits = function() {
		return this.on("keypress", function(t) {
			if (!t.originalEvent.code.match(/(\d$|^Backspace$)/)) return t.preventDefault(), t.stopPropagation(), t.stopImmediatePropagation(), !1
		})
	}
}(jQuery),

/* General */
function(t) {
	"function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
}(function(t) {
	function e(e, s) {
		var n, o, r, a = e.nodeName.toLowerCase();
		return "area" === a ? (n = e.parentNode, o = n.name, !(!e.href || !o || "map" !== n.nodeName.toLowerCase()) && (r = t("img[usemap='#" + o + "']")[0], !!r && i(r))) : (/^(input|select|textarea|button|object)$/.test(a) ? !e.disabled : "a" === a ? e.href || s : s) && i(e)
	}

	function i(e) {
		return t.expr.filters.visible(e) && !t(e).parents().addBack().filter(function() {
			return "hidden" === t.css(this, "visibility")
		}).length
	}
	t.ui = t.ui || {}, t.extend(t.ui, {
		version: "1.11.4",
		keyCode: {
			BACKSPACE: 8,
			COMMA: 188,
			DELETE: 46,
			DOWN: 40,
			END: 35,
			ENTER: 13,
			ESCAPE: 27,
			HOME: 36,
			LEFT: 37,
			PAGE_DOWN: 34,
			PAGE_UP: 33,
			PERIOD: 190,
			RIGHT: 39,
			SPACE: 32,
			TAB: 9,
			UP: 38
		}
	}), t.fn.extend({
		scrollParent: function(e) {
			var i = this.css("position"),
				s = "absolute" === i,
				n = e ? /(auto|scroll|hidden)/ : /(auto|scroll)/,
				o = this.parents().filter(function() {
					var e = t(this);
					return (!s || "static" !== e.css("position")) && n.test(e.css("overflow") + e.css("overflow-y") + e.css("overflow-x"))
				}).eq(0);
			return "fixed" !== i && o.length ? o : t(this[0].ownerDocument || document)
		},
		uniqueId: function() {
			var t = 0;
			return function() {
				return this.each(function() {
					this.id || (this.id = "ui-id-" + ++t)
				})
			}
		}(),
		removeUniqueId: function() {
			return this.each(function() {
				/^ui-id-\d+$/.test(this.id) && t(this).removeAttr("id")
			})
		}
	}), t.extend(t.expr[":"], {
		data: t.expr.createPseudo ? t.expr.createPseudo(function(e) {
			return function(i) {
				return !!t.data(i, e)
			}
		}) : function(e, i, s) {
			return !!t.data(e, s[3])
		},
		focusable: function(i) {
			return e(i, !isNaN(t.attr(i, "tabindex")))
		},
		tabbable: function(i) {
			var s = t.attr(i, "tabindex"),
				n = isNaN(s);
			return (n || s >= 0) && e(i, !n)
		}
	}), t("<a>").outerWidth(1).jquery || t.each(["Width", "Height"], function(e, i) {
		function s(e, i, s, o) {
			return t.each(n, function() {
				i -= parseFloat(t.css(e, "padding" + this)) || 0, s && (i -= parseFloat(t.css(e, "border" + this + "Width")) || 0), o && (i -= parseFloat(t.css(e, "margin" + this)) || 0)
			}), i
		}
		var n = "Width" === i ? ["Left", "Right"] : ["Top", "Bottom"],
			o = i.toLowerCase(),
			r = {
				innerWidth: t.fn.innerWidth,
				innerHeight: t.fn.innerHeight,
				outerWidth: t.fn.outerWidth,
				outerHeight: t.fn.outerHeight
			};
		t.fn["inner" + i] = function(e) {
			return void 0 === e ? r["inner" + i].call(this) : this.each(function() {
				t(this).css(o, s(this, e) + "px")
			})
		}, t.fn["outer" + i] = function(e, n) {
			return "number" != typeof e ? r["outer" + i].call(this, e) : this.each(function() {
				t(this).css(o, s(this, e, !0, n) + "px")
			})
		}
	}), t.fn.addBack || (t.fn.addBack = function(t) {
		return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
	}), t("<a>").data("a-b", "a").removeData("a-b").data("a-b") && (t.fn.removeData = function(e) {
		return function(i) {
			return arguments.length ? e.call(this, t.camelCase(i)) : e.call(this)
		}
	}(t.fn.removeData)), t.ui.ie = !!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()), t.fn.extend({
		focus: function(e) {
			return function(i, s) {
				return "number" == typeof i ? this.each(function() {
					var e = this;
					setTimeout(function() {
						t(e).focus(), s && s.call(e)
					}, i)
				}) : e.apply(this, arguments)
			}
		}(t.fn.focus),
		disableSelection: function() {
			var t = "onselectstart" in document.createElement("div") ? "selectstart" : "mousedown";
			return function() {
				return this.bind(t + ".ui-disableSelection", function(t) {
					t.preventDefault()
				})
			}
		}(),
		enableSelection: function() {
			return this.unbind(".ui-disableSelection")
		},
		zIndex: function(e) {
			if (void 0 !== e) return this.css("zIndex", e);
			if (this.length)
				for (var i, s, n = t(this[0]); n.length && n[0] !== document;) {
					if (i = n.css("position"), ("absolute" === i || "relative" === i || "fixed" === i) && (s = parseInt(n.css("zIndex"), 10), !isNaN(s) && 0 !== s)) return s;
					n = n.parent()
				}
			return 0
		}
	}), t.ui.plugin = {
		add: function(e, i, s) {
			var n, o = t.ui[e].prototype;
			for (n in s) o.plugins[n] = o.plugins[n] || [], o.plugins[n].push([i, s[n]])
		},
		call: function(t, e, i, s) {
			var n, o = t.plugins[e];
			if (o && (s || t.element[0].parentNode && 11 !== t.element[0].parentNode.nodeType))
				for (n = 0; o.length > n; n++) t.options[o[n][0]] && o[n][1].apply(t.element, i)
		}
	};
	var s = 0,
		n = Array.prototype.slice;
	t.cleanData = function(e) {
		return function(i) {
			var s, n, o;
			for (o = 0; null != (n = i[o]); o++) try {
				s = t._data(n, "events"), s && s.remove && t(n).triggerHandler("remove")
			} catch (r) {}
			e(i)
		}
	}(t.cleanData), t.widget = function(e, i, s) {
		var n, o, r, a, l = {},
			u = e.split(".")[0];
		return e = e.split(".")[1], n = u + "-" + e, s || (s = i, i = t.Widget), t.expr[":"][n.toLowerCase()] = function(e) {
			return !!t.data(e, n)
		}, t[u] = t[u] || {}, o = t[u][e], r = t[u][e] = function(t, e) {
			return this._createWidget ? void(arguments.length && this._createWidget(t, e)) : new r(t, e)
		}, t.extend(r, o, {
			version: s.version,
			_proto: t.extend({}, s),
			_childConstructors: []
		}), a = new i, a.options = t.widget.extend({}, a.options), t.each(s, function(e, s) {
			return t.isFunction(s) ? void(l[e] = function() {
				var t = function() {
						return i.prototype[e].apply(this, arguments)
					},
					n = function(t) {
						return i.prototype[e].apply(this, t)
					};
				return function() {
					var e, i = this._super,
						o = this._superApply;
					return this._super = t, this._superApply = n, e = s.apply(this, arguments), this._super = i, this._superApply = o, e
				}
			}()) : void(l[e] = s)
		}), r.prototype = t.widget.extend(a, {
			widgetEventPrefix: o ? a.widgetEventPrefix || e : e
		}, l, {
			constructor: r,
			namespace: u,
			widgetName: e,
			widgetFullName: n
		}), o ? (t.each(o._childConstructors, function(e, i) {
			var s = i.prototype;
			t.widget(s.namespace + "." + s.widgetName, r, i._proto)
		}), delete o._childConstructors) : i._childConstructors.push(r), t.widget.bridge(e, r), r
	}, t.widget.extend = function(e) {
		for (var i, s, o = n.call(arguments, 1), r = 0, a = o.length; a > r; r++)
			for (i in o[r]) s = o[r][i], o[r].hasOwnProperty(i) && void 0 !== s && (e[i] = t.isPlainObject(s) ? t.isPlainObject(e[i]) ? t.widget.extend({}, e[i], s) : t.widget.extend({}, s) : s);
		return e
	}, t.widget.bridge = function(e, i) {
		var s = i.prototype.widgetFullName || e;
		t.fn[e] = function(o) {
			var r = "string" == typeof o,
				a = n.call(arguments, 1),
				l = this;
			return r ? this.each(function() {
				var i, n = t.data(this, s);
				return "instance" === o ? (l = n, !1) : n ? t.isFunction(n[o]) && "_" !== o.charAt(0) ? (i = n[o].apply(n, a), i !== n && void 0 !== i ? (l = i && i.jquery ? l.pushStack(i.get()) : i, !1) : void 0) : t.error("no such method '" + o + "' for " + e + " widget instance") : t.error("cannot call methods on " + e + " prior to initialization; attempted to call method '" + o + "'")
			}) : (a.length && (o = t.widget.extend.apply(null, [o].concat(a))), this.each(function() {
				var e = t.data(this, s);
				e ? (e.option(o || {}), e._init && e._init()) : t.data(this, s, new i(o, this))
			})), l
		}
	}, t.Widget = function() {}, t.Widget._childConstructors = [], t.Widget.prototype = {
		widgetName: "widget",
		widgetEventPrefix: "",
		defaultElement: "<div>",
		options: {
			disabled: !1,
			create: null
		},
		_createWidget: function(e, i) {
			i = t(i || this.defaultElement || this)[0], this.element = t(i), this.uuid = s++, this.eventNamespace = "." + this.widgetName + this.uuid, this.bindings = t(), this.hoverable = t(), this.focusable = t(), i !== this && (t.data(i, this.widgetFullName, this), this._on(!0, this.element, {
				remove: function(t) {
					t.target === i && this.destroy()
				}
			}), this.document = t(i.style ? i.ownerDocument : i.document || i), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)), this.options = t.widget.extend({}, this.options, this._getCreateOptions(), e), this._create(), this._trigger("create", null, this._getCreateEventData()), this._init()
		},
		_getCreateOptions: t.noop,
		_getCreateEventData: t.noop,
		_create: t.noop,
		_init: t.noop,
		destroy: function() {
			this._destroy(), this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(t.camelCase(this.widgetFullName)), this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"), this.bindings.unbind(this.eventNamespace), this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus")
		},
		_destroy: t.noop,
		widget: function() {
			return this.element
		},
		option: function(e, i) {
			var s, n, o, r = e;
			if (0 === arguments.length) return t.widget.extend({}, this.options);
			if ("string" == typeof e)
				if (r = {}, s = e.split("."), e = s.shift(), s.length) {
					for (n = r[e] = t.widget.extend({}, this.options[e]), o = 0; s.length - 1 > o; o++) n[s[o]] = n[s[o]] || {}, n = n[s[o]];
					if (e = s.pop(), 1 === arguments.length) return void 0 === n[e] ? null : n[e];
					n[e] = i
				} else {
					if (1 === arguments.length) return void 0 === this.options[e] ? null : this.options[e];
					r[e] = i
				}
			return this._setOptions(r), this
		},
		_setOptions: function(t) {
			var e;
			for (e in t) this._setOption(e, t[e]);
			return this
		},
		_setOption: function(t, e) {
			return this.options[t] = e, "disabled" === t && (this.widget().toggleClass(this.widgetFullName + "-disabled", !!e), e && (this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus"))), this
		},
		enable: function() {
			return this._setOptions({
				disabled: !1
			})
		},
		disable: function() {
			return this._setOptions({
				disabled: !0
			})
		},
		_on: function(e, i, s) {
			var n, o = this;
			"boolean" != typeof e && (s = i, i = e, e = !1), s ? (i = n = t(i), this.bindings = this.bindings.add(i)) : (s = i, i = this.element, n = this.widget()), t.each(s, function(s, r) {
				function a() {
					return e || o.options.disabled !== !0 && !t(this).hasClass("ui-state-disabled") ? ("string" == typeof r ? o[r] : r).apply(o, arguments) : void 0
				}
				"string" != typeof r && (a.guid = r.guid = r.guid || a.guid || t.guid++);
				var l = s.match(/^([\w:-]*)\s*(.*)$/),
					u = l[1] + o.eventNamespace,
					c = l[2];
				c ? n.delegate(c, u, a) : i.bind(u, a)
			})
		},
		_off: function(e, i) {
			i = (i || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace, e.unbind(i).undelegate(i), this.bindings = t(this.bindings.not(e).get()), this.focusable = t(this.focusable.not(e).get()), this.hoverable = t(this.hoverable.not(e).get())
		},
		_delay: function(t, e) {
			function i() {
				return ("string" == typeof t ? s[t] : t).apply(s, arguments)
			}
			var s = this;
			return setTimeout(i, e || 0)
		},
		_hoverable: function(e) {
			this.hoverable = this.hoverable.add(e), this._on(e, {
				mouseenter: function(e) {
					t(e.currentTarget).addClass("ui-state-hover")
				},
				mouseleave: function(e) {
					t(e.currentTarget).removeClass("ui-state-hover")
				}
			})
		},
		_focusable: function(e) {
			this.focusable = this.focusable.add(e), this._on(e, {
				focusin: function(e) {
					t(e.currentTarget).addClass("ui-state-focus")
				},
				focusout: function(e) {
					t(e.currentTarget).removeClass("ui-state-focus")
				}
			})
		},
		_trigger: function(e, i, s) {
			var n, o, r = this.options[e];
			if (s = s || {}, i = t.Event(i), i.type = (e === this.widgetEventPrefix ? e : this.widgetEventPrefix + e).toLowerCase(), i.target = this.element[0], o = i.originalEvent)
				for (n in o) n in i || (i[n] = o[n]);
			return this.element.trigger(i, s), !(t.isFunction(r) && r.apply(this.element[0], [i].concat(s)) === !1 || i.isDefaultPrevented())
		}
	}, t.each({
		show: "fadeIn",
		hide: "fadeOut"
	}, function(e, i) {
		t.Widget.prototype["_" + e] = function(s, n, o) {
			"string" == typeof n && (n = {
				effect: n
			});
			var r, a = n ? n === !0 || "number" == typeof n ? i : n.effect || i : e;
			n = n || {}, "number" == typeof n && (n = {
				duration: n
			}), r = !t.isEmptyObject(n), n.complete = o, n.delay && s.delay(n.delay), r && t.effects && t.effects.effect[a] ? s[e](n) : a !== e && s[a] ? s[a](n.duration, n.easing, o) : s.queue(function(i) {
				t(this)[e](), o && o.call(s[0]), i()
			})
		}
	}), t.widget;
	var o = !1;
	t(document).mouseup(function() {
			o = !1
		}), t.widget("ui.mouse", {
			version: "1.11.4",
			options: {
				cancel: "input,textarea,button,select,option",
				distance: 1,
				delay: 0
			},
			_mouseInit: function() {
				var e = this;
				this.element.bind("mousedown." + this.widgetName, function(t) {
					return e._mouseDown(t)
				}).bind("click." + this.widgetName, function(i) {
					return !0 === t.data(i.target, e.widgetName + ".preventClickEvent") ? (t.removeData(i.target, e.widgetName + ".preventClickEvent"), i.stopImmediatePropagation(), !1) : void 0
				}), this.started = !1
			},
			_mouseDestroy: function() {
				this.element.unbind("." + this.widgetName), this._mouseMoveDelegate && this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate)
			},
			_mouseDown: function(e) {
				if (!o) {
					this._mouseMoved = !1, this._mouseStarted && this._mouseUp(e), this._mouseDownEvent = e;
					var i = this,
						s = 1 === e.which,
						n = !("string" != typeof this.options.cancel || !e.target.nodeName) && t(e.target).closest(this.options.cancel).length;
					return !(s && !n && this._mouseCapture(e)) || (this.mouseDelayMet = !this.options.delay, this.mouseDelayMet || (this._mouseDelayTimer = setTimeout(function() {
						i.mouseDelayMet = !0
					}, this.options.delay)), this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(e) !== !1, !this._mouseStarted) ? (e.preventDefault(), !0) : (!0 === t.data(e.target, this.widgetName + ".preventClickEvent") && t.removeData(e.target, this.widgetName + ".preventClickEvent"), this._mouseMoveDelegate = function(t) {
						return i._mouseMove(t)
					}, this._mouseUpDelegate = function(t) {
						return i._mouseUp(t)
					}, this.document.bind("mousemove." + this.widgetName, this._mouseMoveDelegate).bind("mouseup." + this.widgetName, this._mouseUpDelegate), e.preventDefault(), o = !0, !0))
				}
			},
			_mouseMove: function(e) {
				if (this._mouseMoved) {
					if (t.ui.ie && (!document.documentMode || 9 > document.documentMode) && !e.button) return this._mouseUp(e);
					if (!e.which) return this._mouseUp(e)
				}
				return (e.which || e.button) && (this._mouseMoved = !0), this._mouseStarted ? (this._mouseDrag(e), e.preventDefault()) : (this._mouseDistanceMet(e) && this._mouseDelayMet(e) && (this._mouseStarted = this._mouseStart(this._mouseDownEvent, e) !== !1, this._mouseStarted ? this._mouseDrag(e) : this._mouseUp(e)), !this._mouseStarted)
			},
			_mouseUp: function(e) {
				return this.document.unbind("mousemove." + this.widgetName, this._mouseMoveDelegate).unbind("mouseup." + this.widgetName, this._mouseUpDelegate), this._mouseStarted && (this._mouseStarted = !1, e.target === this._mouseDownEvent.target && t.data(e.target, this.widgetName + ".preventClickEvent", !0), this._mouseStop(e)), o = !1, !1
			},
			_mouseDistanceMet: function(t) {
				return Math.max(Math.abs(this._mouseDownEvent.pageX - t.pageX), Math.abs(this._mouseDownEvent.pageY - t.pageY)) >= this.options.distance
			},
			_mouseDelayMet: function() {
				return this.mouseDelayMet
			},
			_mouseStart: function() {},
			_mouseDrag: function() {},
			_mouseStop: function() {},
			_mouseCapture: function() {
				return !0
			}
		}),
		function() {
			function e(t, e, i) {
				return [parseFloat(t[0]) * (p.test(t[0]) ? e / 100 : 1), parseFloat(t[1]) * (p.test(t[1]) ? i / 100 : 1)]
			}

			function i(e, i) {
				return parseInt(t.css(e, i), 10) || 0
			}

			function s(e) {
				var i = e[0];
				return 9 === i.nodeType ? {
					width: e.width(),
					height: e.height(),
					offset: {
						top: 0,
						left: 0
					}
				} : t.isWindow(i) ? {
					width: e.width(),
					height: e.height(),
					offset: {
						top: e.scrollTop(),
						left: e.scrollLeft()
					}
				} : i.preventDefault ? {
					width: 0,
					height: 0,
					offset: {
						top: i.pageY,
						left: i.pageX
					}
				} : {
					width: e.outerWidth(),
					height: e.outerHeight(),
					offset: e.offset()
				}
			}
			t.ui = t.ui || {};
			var n, o, r = Math.max,
				a = Math.abs,
				l = Math.round,
				u = /left|center|right/,
				c = /top|center|bottom/,
				h = /[\+\-]\d+(\.[\d]+)?%?/,
				d = /^\w+/,
				p = /%$/,
				f = t.fn.position;
			t.position = {
					scrollbarWidth: function() {
						if (void 0 !== n) return n;
						var e, i, s = t("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),
							o = s.children()[0];
						return t("body").append(s), e = o.offsetWidth, s.css("overflow", "scroll"), i = o.offsetWidth, e === i && (i = s[0].clientWidth), s.remove(), n = e - i
					},
					getScrollInfo: function(e) {
						var i = e.isWindow || e.isDocument ? "" : e.element.css("overflow-x"),
							s = e.isWindow || e.isDocument ? "" : e.element.css("overflow-y"),
							n = "scroll" === i || "auto" === i && e.width < e.element[0].scrollWidth,
							o = "scroll" === s || "auto" === s && e.height < e.element[0].scrollHeight;
						return {
							width: o ? t.position.scrollbarWidth() : 0,
							height: n ? t.position.scrollbarWidth() : 0
						}
					},
					getWithinInfo: function(e) {
						var i = t(e || window),
							s = t.isWindow(i[0]),
							n = !!i[0] && 9 === i[0].nodeType;
						return {
							element: i,
							isWindow: s,
							isDocument: n,
							offset: i.offset() || {
								left: 0,
								top: 0
							},
							scrollLeft: i.scrollLeft(),
							scrollTop: i.scrollTop(),
							width: s || n ? i.width() : i.outerWidth(),
							height: s || n ? i.height() : i.outerHeight()
						}
					}
				}, t.fn.position = function(n) {
					if (!n || !n.of) return f.apply(this, arguments);
					n = t.extend({}, n);
					var p, m, g, v, b, _, w = t(n.of),
						y = t.position.getWithinInfo(n.within),
						k = t.position.getScrollInfo(y),
						x = (n.collision || "flip").split(" "),
						T = {};
					return _ = s(w), w[0].preventDefault && (n.at = "left top"), m = _.width, g = _.height, v = _.offset, b = t.extend({}, v), t.each(["my", "at"], function() {
						var t, e, i = (n[this] || "").split(" ");
						1 === i.length && (i = u.test(i[0]) ? i.concat(["center"]) : c.test(i[0]) ? ["center"].concat(i) : ["center", "center"]), i[0] = u.test(i[0]) ? i[0] : "center", i[1] = c.test(i[1]) ? i[1] : "center", t = h.exec(i[0]), e = h.exec(i[1]), T[this] = [t ? t[0] : 0, e ? e[0] : 0], n[this] = [d.exec(i[0])[0], d.exec(i[1])[0]]
					}), 1 === x.length && (x[1] = x[0]), "right" === n.at[0] ? b.left += m : "center" === n.at[0] && (b.left += m / 2), "bottom" === n.at[1] ? b.top += g : "center" === n.at[1] && (b.top += g / 2), p = e(T.at, m, g), b.left += p[0], b.top += p[1], this.each(function() {
						var s, u, c = t(this),
							h = c.outerWidth(),
							d = c.outerHeight(),
							f = i(this, "marginLeft"),
							_ = i(this, "marginTop"),
							C = h + f + i(this, "marginRight") + k.width,
							$ = d + _ + i(this, "marginBottom") + k.height,
							S = t.extend({}, b),
							P = e(T.my, c.outerWidth(), c.outerHeight());
						"right" === n.my[0] ? S.left -= h : "center" === n.my[0] && (S.left -= h / 2), "bottom" === n.my[1] ? S.top -= d : "center" === n.my[1] && (S.top -= d / 2), S.left += P[0], S.top += P[1], o || (S.left = l(S.left), S.top = l(S.top)), s = {
							marginLeft: f,
							marginTop: _
						}, t.each(["left", "top"], function(e, i) {
							t.ui.position[x[e]] && t.ui.position[x[e]][i](S, {
								targetWidth: m,
								targetHeight: g,
								elemWidth: h,
								elemHeight: d,
								collisionPosition: s,
								collisionWidth: C,
								collisionHeight: $,
								offset: [p[0] + P[0], p[1] + P[1]],
								my: n.my,
								at: n.at,
								within: y,
								elem: c
							})
						}), n.using && (u = function(t) {
							var e = v.left - S.left,
								i = e + m - h,
								s = v.top - S.top,
								o = s + g - d,
								l = {
									target: {
										element: w,
										left: v.left,
										top: v.top,
										width: m,
										height: g
									},
									element: {
										element: c,
										left: S.left,
										top: S.top,
										width: h,
										height: d
									},
									horizontal: 0 > i ? "left" : e > 0 ? "right" : "center",
									vertical: 0 > o ? "top" : s > 0 ? "bottom" : "middle"
								};
							h > m && m > a(e + i) && (l.horizontal = "center"), d > g && g > a(s + o) && (l.vertical = "middle"), l.important = r(a(e), a(i)) > r(a(s), a(o)) ? "horizontal" : "vertical", n.using.call(this, t, l)
						}), c.offset(t.extend(S, {
							using: u
						}))
					})
				}, t.ui.position = {
					fit: {
						left: function(t, e) {
							var i, s = e.within,
								n = s.isWindow ? s.scrollLeft : s.offset.left,
								o = s.width,
								a = t.left - e.collisionPosition.marginLeft,
								l = n - a,
								u = a + e.collisionWidth - o - n;
							e.collisionWidth > o ? l > 0 && 0 >= u ? (i = t.left + l + e.collisionWidth - o - n, t.left += l - i) : t.left = u > 0 && 0 >= l ? n : l > u ? n + o - e.collisionWidth : n : l > 0 ? t.left += l : u > 0 ? t.left -= u : t.left = r(t.left - a, t.left)
						},
						top: function(t, e) {
							var i, s = e.within,
								n = s.isWindow ? s.scrollTop : s.offset.top,
								o = e.within.height,
								a = t.top - e.collisionPosition.marginTop,
								l = n - a,
								u = a + e.collisionHeight - o - n;
							e.collisionHeight > o ? l > 0 && 0 >= u ? (i = t.top + l + e.collisionHeight - o - n, t.top += l - i) : t.top = u > 0 && 0 >= l ? n : l > u ? n + o - e.collisionHeight : n : l > 0 ? t.top += l : u > 0 ? t.top -= u : t.top = r(t.top - a, t.top)
						}
					},
					flip: {
						left: function(t, e) {
							var i, s, n = e.within,
								o = n.offset.left + n.scrollLeft,
								r = n.width,
								l = n.isWindow ? n.scrollLeft : n.offset.left,
								u = t.left - e.collisionPosition.marginLeft,
								c = u - l,
								h = u + e.collisionWidth - r - l,
								d = "left" === e.my[0] ? -e.elemWidth : "right" === e.my[0] ? e.elemWidth : 0,
								p = "left" === e.at[0] ? e.targetWidth : "right" === e.at[0] ? -e.targetWidth : 0,
								f = -2 * e.offset[0];
							0 > c ? (i = t.left + d + p + f + e.collisionWidth - r - o, (0 > i || a(c) > i) && (t.left += d + p + f)) : h > 0 && (s = t.left - e.collisionPosition.marginLeft + d + p + f - l, (s > 0 || h > a(s)) && (t.left += d + p + f))
						},
						top: function(t, e) {
							var i, s, n = e.within,
								o = n.offset.top + n.scrollTop,
								r = n.height,
								l = n.isWindow ? n.scrollTop : n.offset.top,
								u = t.top - e.collisionPosition.marginTop,
								c = u - l,
								h = u + e.collisionHeight - r - l,
								d = "top" === e.my[1],
								p = d ? -e.elemHeight : "bottom" === e.my[1] ? e.elemHeight : 0,
								f = "top" === e.at[1] ? e.targetHeight : "bottom" === e.at[1] ? -e.targetHeight : 0,
								m = -2 * e.offset[1];
							0 > c ? (s = t.top + p + f + m + e.collisionHeight - r - o, (0 > s || a(c) > s) && (t.top += p + f + m)) : h > 0 && (i = t.top - e.collisionPosition.marginTop + p + f + m - l, (i > 0 || h > a(i)) && (t.top += p + f + m))
						}
					},
					flipfit: {
						left: function() {
							t.ui.position.flip.left.apply(this, arguments), t.ui.position.fit.left.apply(this, arguments)
						},
						top: function() {
							t.ui.position.flip.top.apply(this, arguments), t.ui.position.fit.top.apply(this, arguments)
						}
					}
				},
				function() {
					var e, i, s, n, r, a = document.getElementsByTagName("body")[0],
						l = document.createElement("div");
					e = document.createElement(a ? "div" : "body"), s = {
						visibility: "hidden",
						width: 0,
						height: 0,
						border: 0,
						margin: 0,
						background: "none"
					}, a && t.extend(s, {
						position: "absolute",
						left: "-1000px",
						top: "-1000px"
					});
					for (r in s) e.style[r] = s[r];
					e.appendChild(l), i = a || document.documentElement, i.insertBefore(e, i.firstChild), l.style.cssText = "position: absolute; left: 10.7432222px;", n = t(l).offset().left, o = n > 10 && 11 > n, e.innerHTML = "", i.removeChild(e)
				}()
		}(), t.ui.position, t.widget("ui.draggable", t.ui.mouse, {
			version: "1.11.4",
			widgetEventPrefix: "drag",
			options: {
				addClasses: !0,
				appendTo: "parent",
				axis: !1,
				connectToSortable: !1,
				containment: !1,
				cursor: "auto",
				cursorAt: !1,
				grid: !1,
				handle: !1,
				helper: "original",
				iframeFix: !1,
				opacity: !1,
				refreshPositions: !1,
				revert: !1,
				revertDuration: 500,
				scope: "default",
				scroll: !0,
				scrollSensitivity: 20,
				scrollSpeed: 20,
				snap: !1,
				snapMode: "both",
				snapTolerance: 20,
				stack: !1,
				zIndex: !1,
				drag: null,
				start: null,
				stop: null
			},
			_create: function() {
				"original" === this.options.helper && this._setPositionRelative(), this.options.addClasses && this.element.addClass("ui-draggable"), this.options.disabled && this.element.addClass("ui-draggable-disabled"), this._setHandleClassName(), this._mouseInit()
			},
			_setOption: function(t, e) {
				this._super(t, e), "handle" === t && (this._removeHandleClassName(), this._setHandleClassName())
			},
			_destroy: function() {
				return (this.helper || this.element).is(".ui-draggable-dragging") ? void(this.destroyOnClear = !0) : (this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"), this._removeHandleClassName(), void this._mouseDestroy())
			},
			_mouseCapture: function(e) {
				var i = this.options;
				return this._blurActiveElement(e), !(this.helper || i.disabled || t(e.target).closest(".ui-resizable-handle").length > 0) && (this.handle = this._getHandle(e), !!this.handle && (this._blockFrames(i.iframeFix === !0 ? "iframe" : i.iframeFix), !0))
			},
			_blockFrames: function(e) {
				this.iframeBlocks = this.document.find(e).map(function() {
					var e = t(this);
					return t("<div>").css("position", "absolute").appendTo(e.parent()).outerWidth(e.outerWidth()).outerHeight(e.outerHeight()).offset(e.offset())[0]
				})
			},
			_unblockFrames: function() {
				this.iframeBlocks && (this.iframeBlocks.remove(), delete this.iframeBlocks)
			},
			_blurActiveElement: function(e) {
				var i = this.document[0];
				if (this.handleElement.is(e.target)) try {
					i.activeElement && "body" !== i.activeElement.nodeName.toLowerCase() && t(i.activeElement).blur()
				} catch (s) {}
			},
			_mouseStart: function(e) {
				var i = this.options;
				return this.helper = this._createHelper(e), this.helper.addClass("ui-draggable-dragging"), this._cacheHelperProportions(), t.ui.ddmanager && (t.ui.ddmanager.current = this), this._cacheMargins(), this.cssPosition = this.helper.css("position"), this.scrollParent = this.helper.scrollParent(!0), this.offsetParent = this.helper.offsetParent(), this.hasFixedAncestor = this.helper.parents().filter(function() {
					return "fixed" === t(this).css("position")
				}).length > 0, this.positionAbs = this.element.offset(), this._refreshOffsets(e), this.originalPosition = this.position = this._generatePosition(e, !1), this.originalPageX = e.pageX, this.originalPageY = e.pageY, i.cursorAt && this._adjustOffsetFromHelper(i.cursorAt), this._setContainment(), this._trigger("start", e) === !1 ? (this._clear(), !1) : (this._cacheHelperProportions(), t.ui.ddmanager && !i.dropBehaviour && t.ui.ddmanager.prepareOffsets(this, e), this._normalizeRightBottom(), this._mouseDrag(e, !0), t.ui.ddmanager && t.ui.ddmanager.dragStart(this, e), !0)
			},
			_refreshOffsets: function(t) {
				this.offset = {
					top: this.positionAbs.top - this.margins.top,
					left: this.positionAbs.left - this.margins.left,
					scroll: !1,
					parent: this._getParentOffset(),
					relative: this._getRelativeOffset()
				}, this.offset.click = {
					left: t.pageX - this.offset.left,
					top: t.pageY - this.offset.top
				}
			},
			_mouseDrag: function(e, i) {
				if (this.hasFixedAncestor && (this.offset.parent = this._getParentOffset()), this.position = this._generatePosition(e, !0), this.positionAbs = this._convertPositionTo("absolute"), !i) {
					var s = this._uiHash();
					if (this._trigger("drag", e, s) === !1) return this._mouseUp({}), !1;
					this.position = s.position
				}
				return this.helper[0].style.left = this.position.left + "px", this.helper[0].style.top = this.position.top + "px", t.ui.ddmanager && t.ui.ddmanager.drag(this, e), !1
			},
			_mouseStop: function(e) {
				var i = this,
					s = !1;
				return t.ui.ddmanager && !this.options.dropBehaviour && (s = t.ui.ddmanager.drop(this, e)), this.dropped && (s = this.dropped, this.dropped = !1), "invalid" === this.options.revert && !s || "valid" === this.options.revert && s || this.options.revert === !0 || t.isFunction(this.options.revert) && this.options.revert.call(this.element, s) ? t(this.helper).animate(this.originalPosition, parseInt(this.options.revertDuration, 10), function() {
					i._trigger("stop", e) !== !1 && i._clear()
				}) : this._trigger("stop", e) !== !1 && this._clear(), !1
			},
			_mouseUp: function(e) {
				return this._unblockFrames(), t.ui.ddmanager && t.ui.ddmanager.dragStop(this, e), this.handleElement.is(e.target) && this.element.focus(), t.ui.mouse.prototype._mouseUp.call(this, e)
			},
			cancel: function() {
				return this.helper.is(".ui-draggable-dragging") ? this._mouseUp({}) : this._clear(), this
			},
			_getHandle: function(e) {
				return !this.options.handle || !!t(e.target).closest(this.element.find(this.options.handle)).length
			},
			_setHandleClassName: function() {
				this.handleElement = this.options.handle ? this.element.find(this.options.handle) : this.element, this.handleElement.addClass("ui-draggable-handle")
			},
			_removeHandleClassName: function() {
				this.handleElement.removeClass("ui-draggable-handle")
			},
			_createHelper: function(e) {
				var i = this.options,
					s = t.isFunction(i.helper),
					n = s ? t(i.helper.apply(this.element[0], [e])) : "clone" === i.helper ? this.element.clone().removeAttr("id") : this.element;
				return n.parents("body").length || n.appendTo("parent" === i.appendTo ? this.element[0].parentNode : i.appendTo), s && n[0] === this.element[0] && this._setPositionRelative(), n[0] === this.element[0] || /(fixed|absolute)/.test(n.css("position")) || n.css("position", "absolute"), n
			},
			_setPositionRelative: function() {
				/^(?:r|a|f)/.test(this.element.css("position")) || (this.element[0].style.position = "relative")
			},
			_adjustOffsetFromHelper: function(e) {
				"string" == typeof e && (e = e.split(" ")), t.isArray(e) && (e = {
					left: +e[0],
					top: +e[1] || 0
				}), "left" in e && (this.offset.click.left = e.left + this.margins.left), "right" in e && (this.offset.click.left = this.helperProportions.width - e.right + this.margins.left), "top" in e && (this.offset.click.top = e.top + this.margins.top), "bottom" in e && (this.offset.click.top = this.helperProportions.height - e.bottom + this.margins.top)
			},
			_isRootNode: function(t) {
				return /(html|body)/i.test(t.tagName) || t === this.document[0]
			},
			_getParentOffset: function() {
				var e = this.offsetParent.offset(),
					i = this.document[0];
				return "absolute" === this.cssPosition && this.scrollParent[0] !== i && t.contains(this.scrollParent[0], this.offsetParent[0]) && (e.left += this.scrollParent.scrollLeft(), e.top += this.scrollParent.scrollTop()), this._isRootNode(this.offsetParent[0]) && (e = {
					top: 0,
					left: 0
				}), {
					top: e.top + (parseInt(this.offsetParent.css("borderTopWidth"), 10) || 0),
					left: e.left + (parseInt(this.offsetParent.css("borderLeftWidth"), 10) || 0)
				}
			},
			_getRelativeOffset: function() {
				if ("relative" !== this.cssPosition) return {
					top: 0,
					left: 0
				};
				var t = this.element.position(),
					e = this._isRootNode(this.scrollParent[0]);
				return {
					top: t.top - (parseInt(this.helper.css("top"), 10) || 0) + (e ? 0 : this.scrollParent.scrollTop()),
					left: t.left - (parseInt(this.helper.css("left"), 10) || 0) + (e ? 0 : this.scrollParent.scrollLeft())
				}
			},
			_cacheMargins: function() {
				this.margins = {
					left: parseInt(this.element.css("marginLeft"), 10) || 0,
					top: parseInt(this.element.css("marginTop"), 10) || 0,
					right: parseInt(this.element.css("marginRight"), 10) || 0,
					bottom: parseInt(this.element.css("marginBottom"), 10) || 0
				}
			},
			_cacheHelperProportions: function() {
				this.helperProportions = {
					width: this.helper.outerWidth(),
					height: this.helper.outerHeight()
				}
			},
			_setContainment: function() {
				var e, i, s, n = this.options,
					o = this.document[0];
				return this.relativeContainer = null, n.containment ? "window" === n.containment ? void(this.containment = [t(window).scrollLeft() - this.offset.relative.left - this.offset.parent.left, t(window).scrollTop() - this.offset.relative.top - this.offset.parent.top, t(window).scrollLeft() + t(window).width() - this.helperProportions.width - this.margins.left, t(window).scrollTop() + (t(window).height() || o.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : "document" === n.containment ? void(this.containment = [0, 0, t(o).width() - this.helperProportions.width - this.margins.left, (t(o).height() || o.body.parentNode.scrollHeight) - this.helperProportions.height - this.margins.top]) : n.containment.constructor === Array ? void(this.containment = n.containment) : ("parent" === n.containment && (n.containment = this.helper[0].parentNode), i = t(n.containment), s = i[0], void(s && (e = /(scroll|auto)/.test(i.css("overflow")), this.containment = [(parseInt(i.css("borderLeftWidth"), 10) || 0) + (parseInt(i.css("paddingLeft"), 10) || 0), (parseInt(i.css("borderTopWidth"), 10) || 0) + (parseInt(i.css("paddingTop"), 10) || 0), (e ? Math.max(s.scrollWidth, s.offsetWidth) : s.offsetWidth) - (parseInt(i.css("borderRightWidth"), 10) || 0) - (parseInt(i.css("paddingRight"), 10) || 0) - this.helperProportions.width - this.margins.left - this.margins.right, (e ? Math.max(s.scrollHeight, s.offsetHeight) : s.offsetHeight) - (parseInt(i.css("borderBottomWidth"), 10) || 0) - (parseInt(i.css("paddingBottom"), 10) || 0) - this.helperProportions.height - this.margins.top - this.margins.bottom], this.relativeContainer = i))) : void(this.containment = null)
			},
			_convertPositionTo: function(t, e) {
				e || (e = this.position);
				var i = "absolute" === t ? 1 : -1,
					s = this._isRootNode(this.scrollParent[0]);
				return {
					top: e.top + this.offset.relative.top * i + this.offset.parent.top * i - ("fixed" === this.cssPosition ? -this.offset.scroll.top : s ? 0 : this.offset.scroll.top) * i,
					left: e.left + this.offset.relative.left * i + this.offset.parent.left * i - ("fixed" === this.cssPosition ? -this.offset.scroll.left : s ? 0 : this.offset.scroll.left) * i
				}
			},
			_generatePosition: function(t, e) {
				var i, s, n, o, r = this.options,
					a = this._isRootNode(this.scrollParent[0]),
					l = t.pageX,
					u = t.pageY;
				return a && this.offset.scroll || (this.offset.scroll = {
					top: this.scrollParent.scrollTop(),
					left: this.scrollParent.scrollLeft()
				}), e && (this.containment && (this.relativeContainer ? (s = this.relativeContainer.offset(), i = [this.containment[0] + s.left, this.containment[1] + s.top, this.containment[2] + s.left, this.containment[3] + s.top]) : i = this.containment, t.pageX - this.offset.click.left < i[0] && (l = i[0] + this.offset.click.left), t.pageY - this.offset.click.top < i[1] && (u = i[1] + this.offset.click.top), t.pageX - this.offset.click.left > i[2] && (l = i[2] + this.offset.click.left), t.pageY - this.offset.click.top > i[3] && (u = i[3] + this.offset.click.top)), r.grid && (n = r.grid[1] ? this.originalPageY + Math.round((u - this.originalPageY) / r.grid[1]) * r.grid[1] : this.originalPageY, u = i ? n - this.offset.click.top >= i[1] || n - this.offset.click.top > i[3] ? n : n - this.offset.click.top >= i[1] ? n - r.grid[1] : n + r.grid[1] : n, o = r.grid[0] ? this.originalPageX + Math.round((l - this.originalPageX) / r.grid[0]) * r.grid[0] : this.originalPageX, l = i ? o - this.offset.click.left >= i[0] || o - this.offset.click.left > i[2] ? o : o - this.offset.click.left >= i[0] ? o - r.grid[0] : o + r.grid[0] : o), "y" === r.axis && (l = this.originalPageX), "x" === r.axis && (u = this.originalPageY)), {
					top: u - this.offset.click.top - this.offset.relative.top - this.offset.parent.top + ("fixed" === this.cssPosition ? -this.offset.scroll.top : a ? 0 : this.offset.scroll.top),
					left: l - this.offset.click.left - this.offset.relative.left - this.offset.parent.left + ("fixed" === this.cssPosition ? -this.offset.scroll.left : a ? 0 : this.offset.scroll.left)
				}
			},
			_clear: function() {
				this.helper.removeClass("ui-draggable-dragging"), this.helper[0] === this.element[0] || this.cancelHelperRemoval || this.helper.remove(), this.helper = null, this.cancelHelperRemoval = !1, this.destroyOnClear && this.destroy()
			},
			_normalizeRightBottom: function() {
				"y" !== this.options.axis && "auto" !== this.helper.css("right") && (this.helper.width(this.helper.width()), this.helper.css("right", "auto")), "x" !== this.options.axis && "auto" !== this.helper.css("bottom") && (this.helper.height(this.helper.height()), this.helper.css("bottom", "auto"))
			},
			_trigger: function(e, i, s) {
				return s = s || this._uiHash(), t.ui.plugin.call(this, e, [i, s, this], !0), /^(drag|start|stop)/.test(e) && (this.positionAbs = this._convertPositionTo("absolute"), s.offset = this.positionAbs), t.Widget.prototype._trigger.call(this, e, i, s)
			},
			plugins: {},
			_uiHash: function() {
				return {
					helper: this.helper,
					position: this.position,
					originalPosition: this.originalPosition,
					offset: this.positionAbs
				}
			}
		}), t.ui.plugin.add("draggable", "connectToSortable", {
			start: function(e, i, s) {
				var n = t.extend({}, i, {
					item: s.element
				});
				s.sortables = [], t(s.options.connectToSortable).each(function() {
					var i = t(this).sortable("instance");
					i && !i.options.disabled && (s.sortables.push(i), i.refreshPositions(), i._trigger("activate", e, n))
				})
			},
			stop: function(e, i, s) {
				var n = t.extend({}, i, {
					item: s.element
				});
				s.cancelHelperRemoval = !1,
					t.each(s.sortables, function() {
						var t = this;
						t.isOver ? (t.isOver = 0, s.cancelHelperRemoval = !0, t.cancelHelperRemoval = !1, t._storedCSS = {
							position: t.placeholder.css("position"),
							top: t.placeholder.css("top"),
							left: t.placeholder.css("left")
						}, t._mouseStop(e), t.options.helper = t.options._helper) : (t.cancelHelperRemoval = !0, t._trigger("deactivate", e, n))
					})
			},
			drag: function(e, i, s) {
				t.each(s.sortables, function() {
					var n = !1,
						o = this;
					o.positionAbs = s.positionAbs, o.helperProportions = s.helperProportions, o.offset.click = s.offset.click, o._intersectsWith(o.containerCache) && (n = !0, t.each(s.sortables, function() {
						return this.positionAbs = s.positionAbs, this.helperProportions = s.helperProportions, this.offset.click = s.offset.click, this !== o && this._intersectsWith(this.containerCache) && t.contains(o.element[0], this.element[0]) && (n = !1), n
					})), n ? (o.isOver || (o.isOver = 1, s._parent = i.helper.parent(), o.currentItem = i.helper.appendTo(o.element).data("ui-sortable-item", !0), o.options._helper = o.options.helper, o.options.helper = function() {
						return i.helper[0]
					}, e.target = o.currentItem[0], o._mouseCapture(e, !0), o._mouseStart(e, !0, !0), o.offset.click.top = s.offset.click.top, o.offset.click.left = s.offset.click.left, o.offset.parent.left -= s.offset.parent.left - o.offset.parent.left, o.offset.parent.top -= s.offset.parent.top - o.offset.parent.top, s._trigger("toSortable", e), s.dropped = o.element, t.each(s.sortables, function() {
						this.refreshPositions()
					}), s.currentItem = s.element, o.fromOutside = s), o.currentItem && (o._mouseDrag(e), i.position = o.position)) : o.isOver && (o.isOver = 0, o.cancelHelperRemoval = !0, o.options._revert = o.options.revert, o.options.revert = !1, o._trigger("out", e, o._uiHash(o)), o._mouseStop(e, !0), o.options.revert = o.options._revert, o.options.helper = o.options._helper, o.placeholder && o.placeholder.remove(), i.helper.appendTo(s._parent), s._refreshOffsets(e), i.position = s._generatePosition(e, !0), s._trigger("fromSortable", e), s.dropped = !1, t.each(s.sortables, function() {
						this.refreshPositions()
					}))
				})
			}
		}), t.ui.plugin.add("draggable", "cursor", {
			start: function(e, i, s) {
				var n = t("body"),
					o = s.options;
				n.css("cursor") && (o._cursor = n.css("cursor")), n.css("cursor", o.cursor)
			},
			stop: function(e, i, s) {
				var n = s.options;
				n._cursor && t("body").css("cursor", n._cursor)
			}
		}), t.ui.plugin.add("draggable", "opacity", {
			start: function(e, i, s) {
				var n = t(i.helper),
					o = s.options;
				n.css("opacity") && (o._opacity = n.css("opacity")), n.css("opacity", o.opacity)
			},
			stop: function(e, i, s) {
				var n = s.options;
				n._opacity && t(i.helper).css("opacity", n._opacity)
			}
		}), t.ui.plugin.add("draggable", "scroll", {
			start: function(t, e, i) {
				i.scrollParentNotHidden || (i.scrollParentNotHidden = i.helper.scrollParent(!1)), i.scrollParentNotHidden[0] !== i.document[0] && "HTML" !== i.scrollParentNotHidden[0].tagName && (i.overflowOffset = i.scrollParentNotHidden.offset())
			},
			drag: function(e, i, s) {
				var n = s.options,
					o = !1,
					r = s.scrollParentNotHidden[0],
					a = s.document[0];
				r !== a && "HTML" !== r.tagName ? (n.axis && "x" === n.axis || (s.overflowOffset.top + r.offsetHeight - e.pageY < n.scrollSensitivity ? r.scrollTop = o = r.scrollTop + n.scrollSpeed : e.pageY - s.overflowOffset.top < n.scrollSensitivity && (r.scrollTop = o = r.scrollTop - n.scrollSpeed)), n.axis && "y" === n.axis || (s.overflowOffset.left + r.offsetWidth - e.pageX < n.scrollSensitivity ? r.scrollLeft = o = r.scrollLeft + n.scrollSpeed : e.pageX - s.overflowOffset.left < n.scrollSensitivity && (r.scrollLeft = o = r.scrollLeft - n.scrollSpeed))) : (n.axis && "x" === n.axis || (e.pageY - t(a).scrollTop() < n.scrollSensitivity ? o = t(a).scrollTop(t(a).scrollTop() - n.scrollSpeed) : t(window).height() - (e.pageY - t(a).scrollTop()) < n.scrollSensitivity && (o = t(a).scrollTop(t(a).scrollTop() + n.scrollSpeed))), n.axis && "y" === n.axis || (e.pageX - t(a).scrollLeft() < n.scrollSensitivity ? o = t(a).scrollLeft(t(a).scrollLeft() - n.scrollSpeed) : t(window).width() - (e.pageX - t(a).scrollLeft()) < n.scrollSensitivity && (o = t(a).scrollLeft(t(a).scrollLeft() + n.scrollSpeed)))), o !== !1 && t.ui.ddmanager && !n.dropBehaviour && t.ui.ddmanager.prepareOffsets(s, e)
			}
		}), t.ui.plugin.add("draggable", "snap", {
			start: function(e, i, s) {
				var n = s.options;
				s.snapElements = [], t(n.snap.constructor !== String ? n.snap.items || ":data(ui-draggable)" : n.snap).each(function() {
					var e = t(this),
						i = e.offset();
					this !== s.element[0] && s.snapElements.push({
						item: this,
						width: e.outerWidth(),
						height: e.outerHeight(),
						top: i.top,
						left: i.left
					})
				})
			},
			drag: function(e, i, s) {
				var n, o, r, a, l, u, c, h, d, p, f = s.options,
					m = f.snapTolerance,
					g = i.offset.left,
					v = g + s.helperProportions.width,
					b = i.offset.top,
					_ = b + s.helperProportions.height;
				for (d = s.snapElements.length - 1; d >= 0; d--) l = s.snapElements[d].left - s.margins.left, u = l + s.snapElements[d].width, c = s.snapElements[d].top - s.margins.top, h = c + s.snapElements[d].height, l - m > v || g > u + m || c - m > _ || b > h + m || !t.contains(s.snapElements[d].item.ownerDocument, s.snapElements[d].item) ? (s.snapElements[d].snapping && s.options.snap.release && s.options.snap.release.call(s.element, e, t.extend(s._uiHash(), {
					snapItem: s.snapElements[d].item
				})), s.snapElements[d].snapping = !1) : ("inner" !== f.snapMode && (n = m >= Math.abs(c - _), o = m >= Math.abs(h - b), r = m >= Math.abs(l - v), a = m >= Math.abs(u - g), n && (i.position.top = s._convertPositionTo("relative", {
					top: c - s.helperProportions.height,
					left: 0
				}).top), o && (i.position.top = s._convertPositionTo("relative", {
					top: h,
					left: 0
				}).top), r && (i.position.left = s._convertPositionTo("relative", {
					top: 0,
					left: l - s.helperProportions.width
				}).left), a && (i.position.left = s._convertPositionTo("relative", {
					top: 0,
					left: u
				}).left)), p = n || o || r || a, "outer" !== f.snapMode && (n = m >= Math.abs(c - b), o = m >= Math.abs(h - _), r = m >= Math.abs(l - g), a = m >= Math.abs(u - v), n && (i.position.top = s._convertPositionTo("relative", {
					top: c,
					left: 0
				}).top), o && (i.position.top = s._convertPositionTo("relative", {
					top: h - s.helperProportions.height,
					left: 0
				}).top), r && (i.position.left = s._convertPositionTo("relative", {
					top: 0,
					left: l
				}).left), a && (i.position.left = s._convertPositionTo("relative", {
					top: 0,
					left: u - s.helperProportions.width
				}).left)), !s.snapElements[d].snapping && (n || o || r || a || p) && s.options.snap.snap && s.options.snap.snap.call(s.element, e, t.extend(s._uiHash(), {
					snapItem: s.snapElements[d].item
				})), s.snapElements[d].snapping = n || o || r || a || p)
			}
		}), t.ui.plugin.add("draggable", "stack", {
			start: function(e, i, s) {
				var n, o = s.options,
					r = t.makeArray(t(o.stack)).sort(function(e, i) {
						return (parseInt(t(e).css("zIndex"), 10) || 0) - (parseInt(t(i).css("zIndex"), 10) || 0)
					});
				r.length && (n = parseInt(t(r[0]).css("zIndex"), 10) || 0, t(r).each(function(e) {
					t(this).css("zIndex", n + e)
				}), this.css("zIndex", n + r.length))
			}
		}), t.ui.plugin.add("draggable", "zIndex", {
			start: function(e, i, s) {
				var n = t(i.helper),
					o = s.options;
				n.css("zIndex") && (o._zIndex = n.css("zIndex")), n.css("zIndex", o.zIndex)
			},
			stop: function(e, i, s) {
				var n = s.options;
				n._zIndex && t(i.helper).css("zIndex", n._zIndex)
			}
		}), t.ui.draggable, t.widget("ui.menu", {
			version: "1.11.4",
			defaultElement: "<ul>",
			delay: 300,
			options: {
				icons: {
					submenu: "ui-icon-carat-1-e"
				},
				items: "> *",
				menus: "ul",
				position: {
					my: "left-1 top",
					at: "right top"
				},
				role: "menu",
				blur: null,
				focus: null,
				select: null
			},
			_create: function() {
				this.activeMenu = this.element, this.mouseHandled = !1, this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content").toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length).attr({
					role: this.options.role,
					tabIndex: 0
				}), this.options.disabled && this.element.addClass("ui-state-disabled").attr("aria-disabled", "true"), this._on({
					"mousedown .ui-menu-item": function(t) {
						t.preventDefault()
					},
					"click .ui-menu-item": function(e) {
						var i = t(e.target);
						!this.mouseHandled && i.not(".ui-state-disabled").length && (this.select(e), e.isPropagationStopped() || (this.mouseHandled = !0), i.has(".ui-menu").length ? this.expand(e) : !this.element.is(":focus") && t(this.document[0].activeElement).closest(".ui-menu").length && (this.element.trigger("focus", [!0]), this.active && 1 === this.active.parents(".ui-menu").length && clearTimeout(this.timer)))
					},
					"mouseenter .ui-menu-item": function(e) {
						if (!this.previousFilter) {
							var i = t(e.currentTarget);
							i.siblings(".ui-state-active").removeClass("ui-state-active"), this.focus(e, i)
						}
					},
					mouseleave: "collapseAll",
					"mouseleave .ui-menu": "collapseAll",
					focus: function(t, e) {
						var i = this.active || this.element.find(this.options.items).eq(0);
						e || this.focus(t, i)
					},
					blur: function(e) {
						this._delay(function() {
							t.contains(this.element[0], this.document[0].activeElement) || this.collapseAll(e)
						})
					},
					keydown: "_keydown"
				}), this.refresh(), this._on(this.document, {
					click: function(t) {
						this._closeOnDocumentClick(t) && this.collapseAll(t), this.mouseHandled = !1
					}
				})
			},
			_destroy: function() {
				this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-menu-icons ui-front").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(), this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").removeUniqueId().removeClass("ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function() {
					var e = t(this);
					e.data("ui-menu-submenu-carat") && e.remove()
				}), this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")
			},
			_keydown: function(e) {
				var i, s, n, o, r = !0;
				switch (e.keyCode) {
					case t.ui.keyCode.PAGE_UP:
						this.previousPage(e);
						break;
					case t.ui.keyCode.PAGE_DOWN:
						this.nextPage(e);
						break;
					case t.ui.keyCode.HOME:
						this._move("first", "first", e);
						break;
					case t.ui.keyCode.END:
						this._move("last", "last", e);
						break;
					case t.ui.keyCode.UP:
						this.previous(e);
						break;
					case t.ui.keyCode.DOWN:
						this.next(e);
						break;
					case t.ui.keyCode.LEFT:
						this.collapse(e);
						break;
					case t.ui.keyCode.RIGHT:
						this.active && !this.active.is(".ui-state-disabled") && this.expand(e);
						break;
					case t.ui.keyCode.ENTER:
					case t.ui.keyCode.SPACE:
						this._activate(e);
						break;
					case t.ui.keyCode.ESCAPE:
						this.collapse(e);
						break;
					default:
						r = !1, s = this.previousFilter || "", n = String.fromCharCode(e.keyCode), o = !1, clearTimeout(this.filterTimer), n === s ? o = !0 : n = s + n, i = this._filterMenuItems(n), i = o && -1 !== i.index(this.active.next()) ? this.active.nextAll(".ui-menu-item") : i, i.length || (n = String.fromCharCode(e.keyCode), i = this._filterMenuItems(n)), i.length ? (this.focus(e, i), this.previousFilter = n, this.filterTimer = this._delay(function() {
							delete this.previousFilter
						}, 1e3)) : delete this.previousFilter
				}
				r && e.preventDefault()
			},
			_activate: function(t) {
				this.active.is(".ui-state-disabled") || (this.active.is("[aria-haspopup='true']") ? this.expand(t) : this.select(t))
			},
			refresh: function() {
				var e, i, s = this,
					n = this.options.icons.submenu,
					o = this.element.find(this.options.menus);
				this.element.toggleClass("ui-menu-icons", !!this.element.find(".ui-icon").length), o.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-front").hide().attr({
					role: this.options.role,
					"aria-hidden": "true",
					"aria-expanded": "false"
				}).each(function() {
					var e = t(this),
						i = e.parent(),
						s = t("<span>").addClass("ui-menu-icon ui-icon " + n).data("ui-menu-submenu-carat", !0);
					i.attr("aria-haspopup", "true").prepend(s), e.attr("aria-labelledby", i.attr("id"))
				}), e = o.add(this.element), i = e.find(this.options.items), i.not(".ui-menu-item").each(function() {
					var e = t(this);
					s._isDivider(e) && e.addClass("ui-widget-content ui-menu-divider")
				}), i.not(".ui-menu-item, .ui-menu-divider").addClass("ui-menu-item").uniqueId().attr({
					tabIndex: -1,
					role: this._itemRole()
				}), i.filter(".ui-state-disabled").attr("aria-disabled", "true"), this.active && !t.contains(this.element[0], this.active[0]) && this.blur()
			},
			_itemRole: function() {
				return {
					menu: "menuitem",
					listbox: "option"
				}[this.options.role]
			},
			_setOption: function(t, e) {
				"icons" === t && this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(e.submenu), "disabled" === t && this.element.toggleClass("ui-state-disabled", !!e).attr("aria-disabled", e), this._super(t, e)
			},
			focus: function(t, e) {
				var i, s;
				this.blur(t, t && "focus" === t.type), this._scrollIntoView(e), this.active = e.first(), s = this.active.addClass("ui-state-focus").removeClass("ui-state-active"), this.options.role && this.element.attr("aria-activedescendant", s.attr("id")), this.active.parent().closest(".ui-menu-item").addClass("ui-state-active"), t && "keydown" === t.type ? this._close() : this.timer = this._delay(function() {
					this._close()
				}, this.delay), i = e.children(".ui-menu"), i.length && t && /^mouse/.test(t.type) && this._startOpening(i), this.activeMenu = e.parent(), this._trigger("focus", t, {
					item: e
				})
			},
			_scrollIntoView: function(e) {
				var i, s, n, o, r, a;
				this._hasScroll() && (i = parseFloat(t.css(this.activeMenu[0], "borderTopWidth")) || 0, s = parseFloat(t.css(this.activeMenu[0], "paddingTop")) || 0, n = e.offset().top - this.activeMenu.offset().top - i - s, o = this.activeMenu.scrollTop(), r = this.activeMenu.height(), a = e.outerHeight(), 0 > n ? this.activeMenu.scrollTop(o + n) : n + a > r && this.activeMenu.scrollTop(o + n - r + a))
			},
			blur: function(t, e) {
				e || clearTimeout(this.timer), this.active && (this.active.removeClass("ui-state-focus"), this.active = null, this._trigger("blur", t, {
					item: this.active
				}))
			},
			_startOpening: function(t) {
				clearTimeout(this.timer), "true" === t.attr("aria-hidden") && (this.timer = this._delay(function() {
					this._close(), this._open(t)
				}, this.delay))
			},
			_open: function(e) {
				var i = t.extend({
					of: this.active
				}, this.options.position);
				clearTimeout(this.timer), this.element.find(".ui-menu").not(e.parents(".ui-menu")).hide().attr("aria-hidden", "true"), e.show().removeAttr("aria-hidden").attr("aria-expanded", "true").position(i)
			},
			collapseAll: function(e, i) {
				clearTimeout(this.timer), this.timer = this._delay(function() {
					var s = i ? this.element : t(e && e.target).closest(this.element.find(".ui-menu"));
					s.length || (s = this.element), this._close(s), this.blur(e), this.activeMenu = s
				}, this.delay)
			},
			_close: function(t) {
				t || (t = this.active ? this.active.parent() : this.element), t.find(".ui-menu").hide().attr("aria-hidden", "true").attr("aria-expanded", "false").end().find(".ui-state-active").not(".ui-state-focus").removeClass("ui-state-active")
			},
			_closeOnDocumentClick: function(e) {
				return !t(e.target).closest(".ui-menu").length
			},
			_isDivider: function(t) {
				return !/[^\-\u2014\u2013\s]/.test(t.text())
			},
			collapse: function(t) {
				var e = this.active && this.active.parent().closest(".ui-menu-item", this.element);
				e && e.length && (this._close(), this.focus(t, e))
			},
			expand: function(t) {
				var e = this.active && this.active.children(".ui-menu ").find(this.options.items).first();
				e && e.length && (this._open(e.parent()), this._delay(function() {
					this.focus(t, e)
				}))
			},
			next: function(t) {
				this._move("next", "first", t)
			},
			previous: function(t) {
				this._move("prev", "last", t)
			},
			isFirstItem: function() {
				return this.active && !this.active.prevAll(".ui-menu-item").length
			},
			isLastItem: function() {
				return this.active && !this.active.nextAll(".ui-menu-item").length
			},
			_move: function(t, e, i) {
				var s;
				this.active && (s = "first" === t || "last" === t ? this.active["first" === t ? "prevAll" : "nextAll"](".ui-menu-item").eq(-1) : this.active[t + "All"](".ui-menu-item").eq(0)), s && s.length && this.active || (s = this.activeMenu.find(this.options.items)[e]()), this.focus(i, s)
			},
			nextPage: function(e) {
				var i, s, n;
				return this.active ? void(this.isLastItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.nextAll(".ui-menu-item").each(function() {
					return i = t(this), 0 > i.offset().top - s - n
				}), this.focus(e, i)) : this.focus(e, this.activeMenu.find(this.options.items)[this.active ? "last" : "first"]()))) : void this.next(e)
			},
			previousPage: function(e) {
				var i, s, n;
				return this.active ? void(this.isFirstItem() || (this._hasScroll() ? (s = this.active.offset().top, n = this.element.height(), this.active.prevAll(".ui-menu-item").each(function() {
					return i = t(this), i.offset().top - s + n > 0
				}), this.focus(e, i)) : this.focus(e, this.activeMenu.find(this.options.items).first()))) : void this.next(e)
			},
			_hasScroll: function() {
				return this.element.outerHeight() < this.element.prop("scrollHeight")
			},
			select: function(e) {
				this.active = this.active || t(e.target).closest(".ui-menu-item");
				var i = {
					item: this.active
				};
				this.active.has(".ui-menu").length || this.collapseAll(e, !0), this._trigger("select", e, i)
			},
			_filterMenuItems: function(e) {
				var i = e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&"),
					s = RegExp("^" + i, "i");
				return this.activeMenu.find(this.options.items).filter(".ui-menu-item").filter(function() {
					return s.test(t.trim(t(this).text()))
				})
			}
		}), t.widget("ui.autocomplete", {
			version: "1.11.4",
			defaultElement: "<input>",
			options: {
				appendTo: null,
				autoFocus: !1,
				delay: 300,
				minLength: 1,
				position: {
					my: "left top",
					at: "left bottom",
					collision: "none"
				},
				source: null,
				change: null,
				close: null,
				focus: null,
				open: null,
				response: null,
				search: null,
				select: null
			},
			requestIndex: 0,
			pending: 0,
			_create: function() {
				var e, i, s, n = this.element[0].nodeName.toLowerCase(),
					o = "textarea" === n,
					r = "input" === n;
				this.isMultiLine = !!o || !r && this.element.prop("isContentEditable"), this.valueMethod = this.element[o || r ? "val" : "text"], this.isNewMenu = !0, this.element.addClass("ui-autocomplete-input").attr("autocomplete", "off"), this._on(this.element, {
					keydown: function(n) {
						if (this.element.prop("readOnly")) return e = !0, s = !0, void(i = !0);
						e = !1, s = !1, i = !1;
						var o = t.ui.keyCode;
						switch (n.keyCode) {
							case o.PAGE_UP:
								e = !0, this._move("previousPage", n);
								break;
							case o.PAGE_DOWN:
								e = !0, this._move("nextPage", n);
								break;
							case o.UP:
								e = !0, this._keyEvent("previous", n);
								break;
							case o.DOWN:
								e = !0, this._keyEvent("next", n);
								break;
							case o.ENTER:
								this.menu.active && (e = !0, n.preventDefault(), this.menu.select(n));
								break;
							case o.TAB:
								this.menu.active && this.menu.select(n);
								break;
							case o.ESCAPE:
								this.menu.element.is(":visible") && (this.isMultiLine || this._value(this.term), this.close(n), n.preventDefault());
								break;
							default:
								i = !0, this._searchTimeout(n)
						}
					},
					keypress: function(s) {
						if (e) return e = !1, void((!this.isMultiLine || this.menu.element.is(":visible")) && s.preventDefault());
						if (!i) {
							var n = t.ui.keyCode;
							switch (s.keyCode) {
								case n.PAGE_UP:
									this._move("previousPage", s);
									break;
								case n.PAGE_DOWN:
									this._move("nextPage", s);
									break;
								case n.UP:
									this._keyEvent("previous", s);
									break;
								case n.DOWN:
									this._keyEvent("next", s)
							}
						}
					},
					input: function(t) {
						return s ? (s = !1, void t.preventDefault()) : void this._searchTimeout(t)
					},
					focus: function() {
						this.selectedItem = null, this.previous = this._value()
					},
					blur: function(t) {
						return this.cancelBlur ? void delete this.cancelBlur : (clearTimeout(this.searching), this.close(t), void this._change(t))
					}
				}), this._initSource(), this.menu = t("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({
					role: null
				}).hide().menu("instance"), this._on(this.menu.element, {
					mousedown: function(e) {
						e.preventDefault(), this.cancelBlur = !0, this._delay(function() {
							delete this.cancelBlur
						});
						var i = this.menu.element[0];
						t(e.target).closest(".ui-menu-item").length || this._delay(function() {
							var e = this;
							this.document.one("mousedown", function(s) {
								s.target === e.element[0] || s.target === i || t.contains(i, s.target) || e.close()
							})
						})
					},
					menufocus: function(e, i) {
						var s, n;
						return this.isNewMenu && (this.isNewMenu = !1, e.originalEvent && /^mouse/.test(e.originalEvent.type)) ? (this.menu.blur(), void this.document.one("mousemove", function() {
							t(e.target).trigger(e.originalEvent)
						})) : (n = i.item.data("ui-autocomplete-item"), !1 !== this._trigger("focus", e, {
							item: n
						}) && e.originalEvent && /^key/.test(e.originalEvent.type) && this._value(n.value), s = i.item.attr("aria-label") || n.value, void(s && t.trim(s).length && (this.liveRegion.children().hide(), t("<div>").text(s).appendTo(this.liveRegion))))
					},
					menuselect: function(t, e) {
						var i = e.item.data("ui-autocomplete-item"),
							s = this.previous;
						this.element[0] !== this.document[0].activeElement && (this.element.focus(), this.previous = s, this._delay(function() {
							this.previous = s, this.selectedItem = i
						})), !1 !== this._trigger("select", t, {
							item: i
						}) && this._value(i.value), this.term = this._value(), this.close(t), this.selectedItem = i
					}
				}), this.liveRegion = t("<span>", {
					role: "status",
					"aria-live": "assertive",
					"aria-relevant": "additions"
				}).addClass("ui-helper-hidden-accessible").appendTo(this.document[0].body), this._on(this.window, {
					beforeunload: function() {
						this.element.removeAttr("autocomplete")
					}
				})
			},
			_destroy: function() {
				clearTimeout(this.searching), this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"), this.menu.element.remove(), this.liveRegion.remove()
			},
			_setOption: function(t, e) {
				this._super(t, e), "source" === t && this._initSource(), "appendTo" === t && this.menu.element.appendTo(this._appendTo()), "disabled" === t && e && this.xhr && this.xhr.abort()
			},
			_appendTo: function() {
				var e = this.options.appendTo;
				return e && (e = e.jquery || e.nodeType ? t(e) : this.document.find(e).eq(0)), e && e[0] || (e = this.element.closest(".ui-front")), e.length || (e = this.document[0].body), e
			},
			_initSource: function() {
				var e, i, s = this;
				t.isArray(this.options.source) ? (e = this.options.source, this.source = function(i, s) {
					s(t.ui.autocomplete.filter(e, i.term))
				}) : "string" == typeof this.options.source ? (i = this.options.source, this.source = function(e, n) {
					s.xhr && s.xhr.abort(), s.xhr = t.ajax({
						url: i,
						data: e,
						dataType: "json",
						success: function(t) {
							n(t)
						},
						error: function() {
							n([])
						}
					})
				}) : this.source = this.options.source
			},
			_searchTimeout: function(t) {
				clearTimeout(this.searching), this.searching = this._delay(function() {
					var e = this.term === this._value(),
						i = this.menu.element.is(":visible"),
						s = t.altKey || t.ctrlKey || t.metaKey || t.shiftKey;
					(!e || e && !i && !s) && (this.selectedItem = null, this.search(null, t))
				}, this.options.delay)
			},
			search: function(t, e) {
				return t = null != t ? t : this._value(), this.term = this._value(), t.length < this.options.minLength ? this.close(e) : this._trigger("search", e) !== !1 ? this._search(t) : void 0
			},
			_search: function(t) {
				this.pending++, this.element.addClass("ui-autocomplete-loading"), this.cancelSearch = !1, this.source({
					term: t
				}, this._response())
			},
			_response: function() {
				var e = ++this.requestIndex;
				return t.proxy(function(t) {
					e === this.requestIndex && this.__response(t), this.pending--, this.pending || this.element.removeClass("ui-autocomplete-loading")
				}, this)
			},
			__response: function(t) {
				t && (t = this._normalize(t)), this._trigger("response", null, {
					content: t
				}), !this.options.disabled && t && t.length && !this.cancelSearch ? (this._suggest(t), this._trigger("open")) : this._close()
			},
			close: function(t) {
				this.cancelSearch = !0, this._close(t)
			},
			_close: function(t) {
				this.menu.element.is(":visible") && (this.menu.element.hide(), this.menu.blur(), this.isNewMenu = !0, this._trigger("close", t))
			},
			_change: function(t) {
				this.previous !== this._value() && this._trigger("change", t, {
					item: this.selectedItem
				})
			},
			_normalize: function(e) {
				return e.length && e[0].label && e[0].value ? e : t.map(e, function(e) {
					return "string" == typeof e ? {
						label: e,
						value: e
					} : t.extend({}, e, {
						label: e.label || e.value,
						value: e.value || e.label
					})
				})
			},
			_suggest: function(e) {
				var i = this.menu.element.empty();
				this._renderMenu(i, e), this.isNewMenu = !0, this.menu.refresh(), i.show(), this._resizeMenu(), i.position(t.extend({
					of: this.element
				}, this.options.position)), this.options.autoFocus && this.menu.next()
			},
			_resizeMenu: function() {
				var t = this.menu.element;
				t.outerWidth(Math.max(t.width("").outerWidth() + 1, this.element.outerWidth()))
			},
			_renderMenu: function(e, i) {
				var s = this;
				t.each(i, function(t, i) {
					s._renderItemData(e, i)
				})
			},
			_renderItemData: function(t, e) {
				return this._renderItem(t, e).data("ui-autocomplete-item", e)
			},
			_renderItem: function(e, i) {
				return t("<li>").text(i.label).appendTo(e)
			},
			_move: function(t, e) {
				return this.menu.element.is(":visible") ? this.menu.isFirstItem() && /^previous/.test(t) || this.menu.isLastItem() && /^next/.test(t) ? (this.isMultiLine || this._value(this.term), void this.menu.blur()) : void this.menu[t](e) : void this.search(null, e)
			},
			widget: function() {
				return this.menu.element
			},
			_value: function() {
				return this.valueMethod.apply(this.element, arguments)
			},
			_keyEvent: function(t, e) {
				(!this.isMultiLine || this.menu.element.is(":visible")) && (this._move(t, e), e.preventDefault())
			}
		}), t.extend(t.ui.autocomplete, {
			escapeRegex: function(t) {
				return t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
			},
			filter: function(e, i) {
				var s = RegExp(t.ui.autocomplete.escapeRegex(i), "i");
				return t.grep(e, function(t) {
					return s.test(t.label || t.value || t)
				})
			}
		}), t.widget("ui.autocomplete", t.ui.autocomplete, {
			options: {
				messages: {
					noResults: "No search results.",
					results: function(t) {
						return t + (t > 1 ? " results are" : " result is") + " available, use up and down arrow keys to navigate."
					}
				}
			},
			__response: function(e) {
				var i;
				this._superApply(arguments), this.options.disabled || this.cancelSearch || (i = e && e.length ? this.options.messages.results(e.length) : this.options.messages.noResults, this.liveRegion.children().hide(), t("<div>").text(i).appendTo(this.liveRegion))
			}
		}), t.ui.autocomplete, t.widget("ui.selectmenu", {
			version: "1.11.4",
			defaultElement: "<select>",
			options: {
				appendTo: null,
				disabled: null,
				icons: {
					button: "ui-icon-triangle-1-s"
				},
				position: {
					my: "left top",
					at: "left bottom",
					collision: "none"
				},
				width: null,
				change: null,
				close: null,
				focus: null,
				open: null,
				select: null
			},
			_create: function() {
				var t = this.element.uniqueId().attr("id");
				this.ids = {
					element: t,
					button: t + "-button",
					menu: t + "-menu"
				}, this._drawButton(), this._drawMenu(), this.options.disabled && this.disable()
			},
			_drawButton: function() {
				var e = this;
				this.label = t("label[for='" + this.ids.element + "']").attr("for", this.ids.button), this._on(this.label, {
					click: function(t) {
						this.button.focus(), t.preventDefault()
					}
				}), this.element.hide(), this.button = t("<span>", {
					"class": "ui-selectmenu-button ui-widget ui-state-default ui-corner-all",
					tabindex: this.options.disabled ? -1 : 0,
					id: this.ids.button,
					role: "combobox",
					"aria-expanded": "false",
					"aria-autocomplete": "list",
					"aria-owns": this.ids.menu,
					"aria-haspopup": "true"
				}).insertAfter(this.element), t("<span>", {
					"class": "ui-icon " + this.options.icons.button
				}).prependTo(this.button), this.buttonText = t("<span>", {
					"class": "ui-selectmenu-text"
				}).appendTo(this.button), this._setText(this.buttonText, this.element.find("option:selected").text()), this._resizeButton(), this._on(this.button, this._buttonEvents), this.button.one("focusin", function() {
					e.menuItems || e._refreshMenu()
				}), this._hoverable(this.button), this._focusable(this.button)
			},
			_drawMenu: function() {
				var e = this;
				this.menu = t("<ul>", {
					"aria-hidden": "true",
					"aria-labelledby": this.ids.button,
					id: this.ids.menu
				}), this.menuWrap = t("<div>", {
					"class": "ui-selectmenu-menu ui-front"
				}).append(this.menu).appendTo(this._appendTo()), this.menuInstance = this.menu.menu({
					role: "listbox",
					select: function(t, i) {
						t.preventDefault(), e._setSelection(), e._select(i.item.data("ui-selectmenu-item"), t)
					},
					focus: function(t, i) {
						var s = i.item.data("ui-selectmenu-item");
						null != e.focusIndex && s.index !== e.focusIndex && (e._trigger("focus", t, {
							item: s
						}), e.isOpen || e._select(s, t)), e.focusIndex = s.index, e.button.attr("aria-activedescendant", e.menuItems.eq(s.index).attr("id"))
					}
				}).menu("instance"), this.menu.addClass("ui-corner-bottom").removeClass("ui-corner-all"), this.menuInstance._off(this.menu, "mouseleave"), this.menuInstance._closeOnDocumentClick = function() {
					return !1
				}, this.menuInstance._isDivider = function() {
					return !1
				}
			},
			refresh: function() {
				this._refreshMenu(), this._setText(this.buttonText, this._getSelectedItem().text()), this.options.width || this._resizeButton()
			},
			_refreshMenu: function() {
				this.menu.empty();
				var t, e = this.element.find("option");
				e.length && (this._parseOptions(e), this._renderMenu(this.menu, this.items), this.menuInstance.refresh(), this.menuItems = this.menu.find("li").not(".ui-selectmenu-optgroup"), t = this._getSelectedItem(), this.menuInstance.focus(null, t), this._setAria(t.data("ui-selectmenu-item")), this._setOption("disabled", this.element.prop("disabled")))
			},
			open: function(t) {
				this.options.disabled || (this.menuItems ? (this.menu.find(".ui-state-focus").removeClass("ui-state-focus"), this.menuInstance.focus(null, this._getSelectedItem())) : this._refreshMenu(), this.isOpen = !0, this._toggleAttr(), this._resizeMenu(), this._position(), this._on(this.document, this._documentClick), this._trigger("open", t))
			},
			_position: function() {
				this.menuWrap.position(t.extend({
					of: this.button
				}, this.options.position))
			},
			close: function(t) {
				this.isOpen && (this.isOpen = !1, this._toggleAttr(), this.range = null, this._off(this.document), this._trigger("close", t))
			},
			widget: function() {
				return this.button
			},
			menuWidget: function() {
				return this.menu
			},
			_renderMenu: function(e, i) {
				var s = this,
					n = "";
				t.each(i, function(i, o) {
					o.optgroup !== n && (t("<li>", {
						"class": "ui-selectmenu-optgroup ui-menu-divider" + (o.element.parent("optgroup").prop("disabled") ? " ui-state-disabled" : ""),
						text: o.optgroup
					}).appendTo(e), n = o.optgroup), s._renderItemData(e, o)
				})
			},
			_renderItemData: function(t, e) {
				return this._renderItem(t, e).data("ui-selectmenu-item", e)
			},
			_renderItem: function(e, i) {
				var s = t("<li>");
				return i.disabled && s.addClass("ui-state-disabled"), this._setText(s, i.label), s.appendTo(e)
			},
			_setText: function(t, e) {
				e ? t.text(e) : t.html("&#160;")
			},
			_move: function(t, e) {
				var i, s, n = ".ui-menu-item";
				this.isOpen ? i = this.menuItems.eq(this.focusIndex) : (i = this.menuItems.eq(this.element[0].selectedIndex), n += ":not(.ui-state-disabled)"), s = "first" === t || "last" === t ? i["first" === t ? "prevAll" : "nextAll"](n).eq(-1) : i[t + "All"](n).eq(0), s.length && this.menuInstance.focus(e, s)
			},
			_getSelectedItem: function() {
				return this.menuItems.eq(this.element[0].selectedIndex)
			},
			_toggle: function(t) {
				this[this.isOpen ? "close" : "open"](t)
			},
			_setSelection: function() {
				var t;
				this.range && (window.getSelection ? (t = window.getSelection(), t.removeAllRanges(), t.addRange(this.range)) : this.range.select(), this.button.focus())
			},
			_documentClick: {
				mousedown: function(e) {
					this.isOpen && (t(e.target).closest(".ui-selectmenu-menu, #" + this.ids.button).length || this.close(e))
				}
			},
			_buttonEvents: {
				mousedown: function() {
					var t;
					window.getSelection ? (t = window.getSelection(), t.rangeCount && (this.range = t.getRangeAt(0))) : this.range = document.selection.createRange()
				},
				click: function(t) {
					this._setSelection(), this._toggle(t)
				},
				keydown: function(e) {
					var i = !0;
					switch (e.keyCode) {
						case t.ui.keyCode.TAB:
						case t.ui.keyCode.ESCAPE:
							this.close(e), i = !1;
							break;
						case t.ui.keyCode.ENTER:
							this.isOpen && this._selectFocusedItem(e);
							break;
						case t.ui.keyCode.UP:
							e.altKey ? this._toggle(e) : this._move("prev", e);
							break;
						case t.ui.keyCode.DOWN:
							e.altKey ? this._toggle(e) : this._move("next", e);
							break;
						case t.ui.keyCode.SPACE:
							this.isOpen ? this._selectFocusedItem(e) : this._toggle(e);
							break;
						case t.ui.keyCode.LEFT:
							this._move("prev", e);
							break;
						case t.ui.keyCode.RIGHT:
							this._move("next", e);
							break;
						case t.ui.keyCode.HOME:
						case t.ui.keyCode.PAGE_UP:
							this._move("first", e);
							break;
						case t.ui.keyCode.END:
						case t.ui.keyCode.PAGE_DOWN:
							this._move("last", e);
							break;
						default:
							this.menu.trigger(e), i = !1
					}
					i && e.preventDefault()
				}
			},
			_selectFocusedItem: function(t) {
				var e = this.menuItems.eq(this.focusIndex);
				e.hasClass("ui-state-disabled") || this._select(e.data("ui-selectmenu-item"), t)
			},
			_select: function(t, e) {
				var i = this.element[0].selectedIndex;
				this.element[0].selectedIndex = t.index, this._setText(this.buttonText, t.label), this._setAria(t), this._trigger("select", e, {
					item: t
				}), t.index !== i && this._trigger("change", e, {
					item: t
				}), this.close(e)
			},
			_setAria: function(t) {
				var e = this.menuItems.eq(t.index).attr("id");
				this.button.attr({
					"aria-labelledby": e,
					"aria-activedescendant": e
				}), this.menu.attr("aria-activedescendant", e)
			},
			_setOption: function(t, e) {
				"icons" === t && this.button.find("span.ui-icon").removeClass(this.options.icons.button).addClass(e.button), this._super(t, e), "appendTo" === t && this.menuWrap.appendTo(this._appendTo()), "disabled" === t && (this.menuInstance.option("disabled", e), this.button.toggleClass("ui-state-disabled", e).attr("aria-disabled", e), this.element.prop("disabled", e), e ? (this.button.attr("tabindex", -1), this.close()) : this.button.attr("tabindex", 0)), "width" === t && this._resizeButton()
			},
			_appendTo: function() {
				var e = this.options.appendTo;
				return e && (e = e.jquery || e.nodeType ? t(e) : this.document.find(e).eq(0)), e && e[0] || (e = this.element.closest(".ui-front")), e.length || (e = this.document[0].body), e
			},
			_toggleAttr: function() {
				this.button.toggleClass("ui-corner-top", this.isOpen).toggleClass("ui-corner-all", !this.isOpen).attr("aria-expanded", this.isOpen), this.menuWrap.toggleClass("ui-selectmenu-open", this.isOpen), this.menu.attr("aria-hidden", !this.isOpen)
			},
			_resizeButton: function() {
				var t = this.options.width;
				t || (t = this.element.show().outerWidth(), this.element.hide()), this.button.outerWidth(t)
			},
			_resizeMenu: function() {
				this.menu.outerWidth(Math.max(this.button.outerWidth(), this.menu.width("").outerWidth() + 1))
			},
			_getCreateOptions: function() {
				return {
					disabled: this.element.prop("disabled")
				}
			},
			_parseOptions: function(e) {
				var i = [];
				e.each(function(e, s) {
					var n = t(s),
						o = n.parent("optgroup");
					i.push({
						element: n,
						index: e,
						value: n.val(),
						label: n.text(),
						optgroup: o.attr("label") || "",
						disabled: o.prop("disabled") || n.prop("disabled")
					})
				}), this.items = i
			},
			_destroy: function() {
				this.menuWrap.remove(), this.button.remove(), this.element.show(), this.element.removeUniqueId(), this.label.attr("for", this.ids.element)
			}
		})
}), ! function(t) {
	function e(t, e) {
		if (!(t.originalEvent.touches.length > 1)) {
			t.preventDefault();
			var i = t.originalEvent.changedTouches[0],
				s = document.createEvent("MouseEvents");
			s.initMouseEvent(e, !0, !0, window, 1, i.screenX, i.screenY, i.clientX, i.clientY, !1, !1, !1, !1, 0, null), t.target.dispatchEvent(s)
		}
	}
	if (t.support.touch = "ontouchend" in document, t.support.touch) {
		var i, s = t.ui.mouse.prototype,
			n = s._mouseInit,
			o = s._mouseDestroy;
		s._touchStart = function(t) {
			var s = this;
			!i && s._mouseCapture(t.originalEvent.changedTouches[0]) && (i = !0, s._touchMoved = !1, e(t, "mouseover"), e(t, "mousemove"), e(t, "mousedown"))
		}, s._touchMove = function(t) {
			i && (this._touchMoved = !0, e(t, "mousemove"))
		}, s._touchEnd = function(t) {
			i && (e(t, "mouseup"), e(t, "mouseout"), this._touchMoved || e(t, "click"), i = !1)
		}, s._mouseInit = function() {
			var e = this;
			e.element.bind({
				touchstart: t.proxy(e, "_touchStart"),
				touchmove: t.proxy(e, "_touchMove"),
				touchend: t.proxy(e, "_touchEnd")
			}), n.call(e)
		}, s._mouseDestroy = function() {
			var e = this;
			e.element.unbind({
				touchstart: t.proxy(e, "_touchStart"),
				touchmove: t.proxy(e, "_touchMove"),
				touchend: t.proxy(e, "_touchEnd")
			}), o.call(e)
		}
	}
}(jQuery),

/* Keyup, paste, copy, cut trigger change */
function(t) {
	t.fn.bindContentEditableChange = function() {
		return this.each(function() {
			var e = t(this),
				i = e.html();
			e.bind("keyup paste copy cut", function(t) {
				var s = e.html();
				i !== s && e.trigger("change")
			})
		})
	}
}(jQuery),

/* Mouse wheel scroll */
function(t) {
	t.fn.preventScrollPropagation = function() {
		this.on("DOMMouseScroll mousewheel", function(e) {
			var i = t(this),
				s = this.scrollTop,
				n = this.scrollHeight,
				o = i.height(),
				r = "DOMMouseScroll" == e.type ? e.originalEvent.detail * -40 : e.originalEvent.wheelDelta,
				a = r > 0,
				l = function() {
					return e.stopPropagation(), e.preventDefault(), e.returnValue = !1, !1
				};
			return !a && -r >= n - o - s ? (i.scrollTop(n), l()) : a && r >= s ? (i.scrollTop(0), l()) : void 0
		})
	}
}(jQuery),

/* Language selector */
function() {
	var t = {
		toggleLanguageSelect: function() {
			$(this).is(":checked") ? $("#contact-speaks-language-button").css("display", "inline-block") : ($("#contact-speaks-language-button").hide(), $("#contact-speaks-language").val(null))
		},
		bindEvents: function() {
			$("input[name=speaks-swedish]").on("change", this.toggleLanguageSelect)
		},
		init: function() {
			this.bindEvents()
		}
	};
	$(window).load(function() {
		t.init()
	})
}(),

/* How it works (somehow effects calculator) */
function() {
	var t = {
		isRightPage: function() {
			return $(".how-it-works-page").length > 0
		},
		browserWidth: window.innerWidth,
		stickyHowItWorksCarousel: function() {
			var t, e, i = $(".page-header"),
				s = $(".top-sub-menu-wrapper"),
				n = $(".how-it-works-page .guide .container .col-sm-7"),
				o = $(".how-it-works-page .guide .container .col-sm-5"),
				r = $(".how-it-works-page .guide .container .col-sm-5 .how-it-works-carousel"),
				a = {},
				l = 15;
			r.width(r.width()), o.height(n.height()), e = "absolute" === s.css("position") ? i.height() : i.height() + s.height(), $(document).on("scroll", function() {
				a.top = n.offset().top - e - l, a.bottom = a.top + n.height() - r.outerHeight(), t = $(this).scrollTop(), t > a.top && t < a.bottom ? (r.addClass("sticky").removeClass("bottom"), r.css({
					top: e + l,
					bottom: ""
				})) : t >= a.bottom ? (r.removeClass("sticky").addClass("bottom"), r.css({
					top: "",
					bottom: 0
				})) : (r.removeClass("sticky").removeClass("bottom"), r.css({
					top: 0,
					bottom: ""
				}))
			})
		},
		init: function() {
			this.isRightPage() && this.browserWidth > 767 && this.stickyHowItWorksCarousel()
		}
	};
	$(window).load(function() {
		t.init()
	})
}(),

/* Menu toggle */
function() {
	"use strict";
	var t = {
			browserWidth: window.innerWidth,
			elems: {
				header: $(".page-header"),
				menuWrapper: $(".top-menu-wrapper"),
				pageWrapper: $(".page-wrapper"),
				topSub: $(".top-sub-menu-wrapper"),
				topSubListEls: $(".top-sub-menu li"),
				topSubMenuSection: $(".top-menu-section")
			},
			toggleMenu: function(t) {
				this.elems.pageWrapper.toggleClass("menu-open"), t && t.stopPropagation()
			},
			stopMenuPropagation: function(t) {
				t.stopPropagation()
			},
			toggleDropDown: function(t) {
				var e, i;
				e = $(t.currentTarget), i = e.find(".select-list-sub"), i.hasClass(".shown") ? i.slideUp("fast") : i.slideDown("fast"), i.toggleClass(".shown"), t.stopPropagation()
			},
			closeAllMenus: function(t) {
				$(".select-list-sub").slideUp().removeClass("shown"), this.elems.header.removeClass("menu-open"), this.elems.pageWrapper.hasClass("menu-open") && this.toggleMenu()
			},
			styleSelects: function() {
				$(".styled-select").selectmenu()
			},
			toggleSubMenu: function(t) {
				$(t.currentTarget).siblings("ul").toggleClass("open"), t.preventDefault()
			},
			toggleTopSubMenu: function(t) {
				var e, i;
				i = $(".top-sub-menu-wrapper "), e = i.find("ul"), i.toggleClass("menu-open"), e.slideToggle({
					duration: 200
				}), this.animatingTopMenu = !0
			},
			toggleElement: function(t) {
				$(".toggle-element").on("click", function() {
					var t, e;
					t = $(this), e = $("#" + t.data("element")), e.is(":visible") ? e.hide() : e.show()
				})
			},
			clickTopSubMenu: function(t) {
				t.preventDefault();
				var e, i, s, n;
				e = $(t.currentTarget), i = e.attr("href"), i && (s = $(i), n = this.elems.topSub.hasClass("sticky") ? 158 : 116, Utils.scrollToElem(s, n), this.browserWidth < 769 && this.toggleTopSubMenu())
			},
			stickyTopSubMenu: function() {
				if (this.elems.topSub.length > 0) {
					var t, e;
					t = this, e = $(document).scrollTop();
					var i = function(e) {
						t.elems.topSubMenuSection.each(function(i, s) {
							var n, o, r;
							n = $(s), o = n.offset().top - 58 - 100, r = o + n.outerHeight(), e >= o && e <= r && (t.elems.topSubListEls.removeClass("selected"), $("#" + n.attr("id") + "-li").addClass("selected"))
						})
					};
					$(document).on("scroll", function() {
						t.browserWidth < 767 && ($(this).scrollTop() > 100 ? t.elems.topSub.addClass("sticky") : t.elems.topSub.removeClass("sticky")), i($(this).scrollTop())
					}), $(".top-sub-go-top").on("click", function(t) {
						Utils.scrollToElem($(".page-wrapper")), t.preventDefault()
					}), i($(this).scrollTop()), e > 100 && (t.browserWidth > 767 && t.elems.topSub.addClass("sticky"), i(e))
				}
			},
			stickyHeader: function() {
				var t, e, i, s;
				if (t = $(".page-header"), e = $(".start-page-hero").length > 0, i = 600, s = "25, 104, 137,", e = !1) {
					var n = function(e) {
						e > 5 && t.hasClass("transparent-bg") ? t.removeClass("transparent-bg") : e <= 5 && t.addClass("transparent-bg")
					};
					$(document).on("scroll", function() {
						n($(this).scrollTop())
					}), n($(document).scrollTop())
				}
			},
			modalSettings: function() {
				$.modal.defaults.clickClose = !1
			},
			clickScrollToLink: function(t) {
				var e, i;
				e = $(t.currentTarget), i = $("#" + e.attr("href")), Utils.scrollToElem(i), t.preventDefault()
			},
			initTabs: function() {
				var t, e, i;
				t = $(".tabs .tab-btn"), e = $(".tab-content"), i = function(i) {
					var s, n;
					s = $(i.currentTarget), n = s.data("id"), t.removeClass("active"), s.addClass("active"), e.hide(), $("#tab-" + n).show()
				}, t.on("click", i), $(".tab-selector").selectmenu({
					select: function(t, i) {
						console.log(i), e.hide(), $("#tab-" + i.item.value).show()
					}
				})
			},
			bindEvents: function() {
				$(".menu-btn").on("click", this.toggleMenu.bind(this)), $(".select-list").on("click", this.toggleDropDown), $("body").on("click", this.closeAllMenus.bind(this)), $(".sub-menu-link").on("click", this.toggleSubMenu), this.browserWidth < 767 && $(".top-sub-menu-wrapper p").on("click", this.toggleTopSubMenu), $(".top-sub-menu a").on("click", this.clickTopSubMenu.bind(this)), $(".scroll-to-elem").on("click", this.clickScrollToLink), $(".top-menu-wrapper").on("click", this.stopMenuPropagation.bind(this))
			},
			init: function() {
				this.bindEvents(), this.styleSelects(), this.modalSettings(), this.initTabs(), this.stickyTopSubMenu(), this.stickyHeader(), this.toggleElement()
			}
		},
		e = {
			browserWidth: window.innerWidth,
			howItWorksCarousel: function() {
				var t, e;
				t = $(".how-it-works-carousel"), e = $(".how-it-works-carousel-btn"), t.slick({
					appendArrows: !1,
					draggable: !1,
					fade: !0
				});
				var i = function(i) {
					var s, n, o;
					s = $(i.currentTarget), n = s.data("num"), o = "active", e.removeClass(o), s.addClass(o), t.slick("slickGoTo", n)
				};
				e.on("click", i), e.on("mouseover", i), $(e[0]).addClass("active")
			},
			submitContactForm: function(t) {
				var e = $(".contact-spinner"),
					i = function() {
						var t, i, s, n, o, r, a, l, u;
						t = $("#contact-name").val(), i = $("#contact-phone").val(), s = $("#contact-email").val(), n = $("#contact-message").val(), a = $("#contact-send-to").val(), o = $("#contact-call-me").is(":checked"), r = $("#contact-time").find(":selected").text(), l = $("#contact-form [name=speaks-swedish]").val(), u = $("#contact-form [name=speaks-language]").val(), $.ajax({
							method: "POST",
							url: ajaxurl,
							data: {
								action: "post_contact_form",
								name: t,
								phone: i,
								email: s,
								message: n,
								callMe: o,
								time: r,
								sendTo: a,
								speaksSwedish: l,
								language: u
							},
							success: function(t) {
								$(".success-msg").show(), e.hide()
							},
							error: function(t) {
								e.hide(), $(".error-msg").show()
							}
						})
					};
				Utils.validateForm($(t.currentTarget)) && (i(), e.show(), $(t.currentTarget).hide()), t.preventDefault()
			},
			submitInsuranceContactForm: function(t) {
				var e = $(".contact-spinner"),
					i = function() {
						var t, i, s, n, o;
						t = $("#contact-name").val(), i = $("#contact-phone").val(), s = $("#contact-email").val(), n = $("#contact-message").val(), o = $("#contact-send-to").val(), $.ajax({
							method: "POST",
							url: ajaxurl,
							data: {
								action: "post_insurance_form",
								name: t,
								phone: i,
								email: s,
								message: n,
								sendTo: o
							},
							success: function(t) {
								$(".success-msg").show(), e.hide()
							},
							error: function(t) {
								e.hide(), $(".error-msg").show()
							}
						})
					};
				Utils.validateForm($(t.currentTarget)) && (i(), e.show(), $(t.currentTarget).hide()), t.preventDefault()
			},
			submitCompanyContactForm: function(t) {
				var e = $(".contact-spinner"),
					i = function() {
						var t, i, s, n, o;
						t = $("#contact-name").val(), i = $("#contact-phone").val(), s = $("#contact-email").val(), n = $("#contact-message").val(), o = $("#contact-send-to").val(), $.ajax({
							method: "POST",
							url: ajaxurl,
							data: {
								action: "post_company_form",
								name: t,
								phone: i,
								email: s,
								message: n,
								sendTo: o
							},
							success: function(t) {
								$(".success-msg").show(), e.hide()
							},
							error: function(t) {
								e.hide(), $(".error-msg").show()
							}
						})
					};
				Utils.validateForm($(t.currentTarget)) && (i(), e.show(), $(t.currentTarget).hide()), t.preventDefault()
			},
			submitLoginForm: function(t) {},
			networkShowMoreBtn: function() {
				$(".show-more").on("click", function(t) {
					var e, i;
					e = $(t.currentTarget), i = e.data("section"), $("." + i).show(), e.hide()
				})
			},
			init: function() {
				$("#contact-form").on("submit", this.submitContactForm), $("#insurance-form").on("submit", this.submitInsuranceContactForm), $("#login-form").on("submit", this.submitLoginForm), $("#company-form").on("submit", this.submitCompanyContactForm), this.browserWidth > 767 && this.howItWorksCarousel(), this.networkShowMoreBtn()
			}
		},
		i = {
			elems: {
				menu: $(".top-menu-wrapper"),
				header: $(".page-header"),
				window: $(window)
			},
			updateMenuSize: function() {
				var t = this.elems.header.outerHeight(),
					e = this.elems.window.innerHeight();
				this.elems.menu.css("height", e - t)
			},
			init: function() {
				this.updateMenuSize(), this.elems.menu.preventScrollPropagation(), this.elems.window.on("resize", this.updateMenuSize.bind(this))
			}
		},
		s = {
			init: function() {}
		},
		n = {
			cookiesAccepted: function() {
				return 1 == o.get().cookies_accepted
			},
			acceptCookies: function() {
				o.set("cookies_accepted", 1, 31536e3)
			},
			show: function() {
				//$(".cookie-consent").show()
			},
			hide: function() {
				$(".cookie-consent").hide()
			},
			bind: function() {
				var t = this;
				$(".cookie-consent .accept-button").on("click", function() {
					t.acceptCookies(), t.hide()
				})
			},
			init: function() {
				this.bind(), this.cookiesAccepted() || this.show()
			}
		},
		o = {
			getWhere: function(t) {
				var e = this.get(),
					i = Object.keys(e).filter(function(e) {
						return e.match(t)
					}),
					s = {};
				for (var n in i) {
					var o = i[n];
					s[o] = e[o]
				}
				return s
			},
			domain: function() {
				return "." + window.location.hostname.split(".").slice(-2).join(".")
			},
			set: function(t, e, i) {
				i = i || "", document.cookie = encodeURIComponent(t) + "=" + e + "; expires=" + i + "; domain=" + this.domain() + "; path=/"
			},
			remove: function(t) {
				this.set(t, "", "Thu, 01 Jan 1970 00:00:00 GMT")
			},
			get: function() {
				for (var t = document.cookie.split(";"), e = {}, i = 0; i < t.length; i++) {
					var s = t[i].indexOf("="),
						n = t[i].substr(0, s).trim(),
						o = t[i].substr(s + 1);
					e[n] = o
				}
				return e
			},
			signedIn: function() {
				var t = this.get();
				return t.session_userID > 0
			}
		},
		r = {
			fields: function() {
				return o.getWhere(/^session_/)
			},
			showConfirmationMessage: function() {
				var t = this.fields(),
					e = $("#email-confirmation-message");
				1 == t.session_confirmed && (e.find(".password").text(Utils.decodeUriString(t.session_password)), e.show(), o.remove("session_confirmed"), o.remove("session_password"))
			},
			showPasswordResetButton: function() {
				var t = this.fields(),
					e = $("#password-reset-message");
				1 == t.session_password_reset && (e.find(".password").text(Utils.decodeUriString(t.session_password)), e.show(), o.remove("session_password_reset"), o.remove("session_password"))
			},
			init: function() {
				this.showConfirmationMessage(), this.showPasswordResetButton()
			}
		},
		a = {
			playButtonClass: ".play-btn",
			openPlayer: function(t) {
				u.cleanUp();
				var e = $(this).data("youtubeId"),
					i = new c(e);
				i.open()
			},
			bindPlayers: function() {
				$(this.playButtonClass).on("touchstart click", this.openPlayer)
			},
			init: function() {
				this.bindPlayers()
			}
		},
		l = function() {
			var t = function(t) {
				this.id = null, this.elem = null, this.settings = "autoplay=1&modestbranding=1&rel=0&showinfo=0&autohide=1&color=white&iv_load_policy=3", this.construct = function(t) {
					this.id = t, this.build()
				}, this.construct(t)
			};
			return t.prototype.build = function() {
				var t = $("<iframe>");
				return t.attr("src", this.src()), t.attr("frameborder", 0), t.attr("allowfullscreen", "allowfullscreen"), this.elem = t, t
			}, t.prototype.src = function() {
				return "https://www.youtube.com/embed/" + this.id + "?" + this.settings
			}, t
		}(window),
		u = function() {
			var t = function() {
				this.elem = null, this.construct = function() {
					this.build(), this.bindEvents()
				}, this.bindEvents = function() {
					this.elem.on("click", ".close", this.onClose.bind(this))
				}, this.onClose = function() {
					this.close()
				}, this.construct()
			};
			return t.prototype.build = function() {
				var t = $("<div>");
				t.addClass("modal"), t.data("modal", this);
				var e = $("<div>");
				return e.addClass("close"), t.append(e), this.elem = t, t
			}, t.prototype.open = function() {
				$("body").append(this.elem), this.elem.show()
			}, t.prototype.close = function() {
				this.elem.remove()
			}, t.cleanUp = function() {
				$(".modal").remove()
			}, t
		}(window),
		c = function() {
			var t = function(t) {
				this.construct = function(t) {
					this.player = new l(t), u.call(this)
				}, this.construct(t)
			};
			return t.prototype = Object.create(u.prototype), t.prototype.build = function() {
				u.prototype.build.call(this), this.elem.addClass("modal-player");
				var t = $("<div>");
				t.addClass("inner"), this.elem.append(t.html(this.player.elem))
			}, t
		}(window);
	$(window).load(function() {
		t.init(), e.init(), i.init(), s.init(), n.init(), a.init(), r.init()
	})
}(),

/* Main page */
function() {
	var t = {
		browserWidth: window.innerWidth,
		elems: {
			calcTableWrapper: $(".calc-tables"),
			calcTableHiddenBtnText: $(".table-hidden"),
			calcTableShownBtnText: $(".table-shown")
		},
		initDragButton: function() {
			var t, e, i, s, n, o, r, a, l, u, c, h, d, p, f, m, g, v;
			g = 0, v = 25e4, t = $(".drag-container").outerWidth(), taxes = .5, a = $(".drag-btn"), m = a.outerWidth(), l = this, e = 0, h = 2, p = 5.626821434, f = 900, roundToNumberSlider = 100, roundToNumberSpan = 1, snapToValue = roundToNumberSlider, invoiceSumField = $(".start-calc .container .total"), dragBtnLeftArrow = $(".start-calc .container .drag-btn-left"), dragBtnRightArrow = $(".start-calc .container .drag-btn-right"), c = 0, $(".age-select").selectmenu({
				select: function(t, e) {
					c = parseInt(e.item.value), k(x()), P(d), O()
				}
			}), invoiceSumField.onlyDigits(), invoiceSumField.bindContentEditableChange(), invoiceSumField.on("change", function(t) {
				var e = parseInt($(this).text().replace(" ", ""));
				y(roundToNumberSpan);
				var i = M(e, !1);
				I(i), E(i), D(i)
			}), invoiceSumField.on("blur", function(t) {
				var e = parseInt($(this).text().replace(" ", ""));
				y(roundToNumberSpan);
				var i = M(e, !0);
				I(i), E(i), D(i)
			}), dragBtnLeftArrow.on("click", function(t) {
				T("left")
			}), dragBtnRightArrow.on("click", function(t) {
				T("right")
			});
			var b = function() {
					return u.settings[c]
				},
				_ = function() {
					return u.vat
				},
				w = function() {
					return snapToValue
				},
				y = function(t) {
					snapToValue = t
				},
				k = function(t) {
					var e = $(".parts-list");
					e.find(".calc-frilansfinans .parts-list-value").text(t.frilansfinans), e.find(".calc-taxes .parts-list-value").text(t.taxes), e.find(".calc-client .parts-list-value").text(t.client)
				},
				x = function() {
					var t = b(),
						e = H(100, t);
					return {
						frilansfinans: +t.fee,
						taxes: Math.round(e.socialFeeAmount + e.tax),
						client: Math.round(e.netto)
					}
				},
				T = function(t) {
					var e = "left" === t ? .1 : -.1,
						i = S(C()),
						s = A(i - e);
					y(roundToNumberSlider);
					var n = M(s, !0);
					I(n), E(n), D(n)
				},
				C = function() {
					var t = a.position().left;
					return a.css("left", t + "px"), t
				},
				S = function(e) {
					var i = e / (t - m);
					return Utils.between(i, 0, 1)
				},
				P = function(e) {
					var i, s, n, o;
					n = C(), i = e !== -1 ? e : (t - m) / 2, d = i, s = S(i), o = A(s), y(roundToNumberSlider);
					var r = M(o, !0);
					E(r), D(r)
				},
				M = function(t, i) {
					t = isNaN(t) ? 0 : t, e = Utils.between(t, g, v), e = Math.round(e / h / w()) * w() * h;
					var s = 1e-4,
						n = A(1 - s);
					e = e > n ? v : e;
					var a = b(),
						l = H(e, a);
					return i && r.html(Utils.toMoney(l.invoice)), O(), o.html(Utils.toMoney(l.netto)), e
				},
				I = function(e) {
					var i = W(e);
					a.css({
						left: (t - m) * i
					})
				},
				E = function(e) {
					var o = W(e),
						r = o * (t - m),
						a = x();
					taxesWidth = o * a.taxes, ffWidth = o * a.frilansfinans, i.css("width", r + "px"), n.css("width", taxesWidth + "%"), s.css("width", ffWidth + "%")
				},
				D = function(t) {
					$("a.create-invoice-link").each(function() {
						var e = $(this).attr("href"),
							i = e.split("?")[0];
						//$(this).attr("href", i + "?invoiceSum=" + t)
					})
				},
				W = function(t) {
					var i = e / f,
						s = Math.log(i) / p;
					return Utils.between(s, 0, 1)
				},
				A = function(t) {
					return t <= 0 ? 0 : parseInt(f * Math.exp(p * t))
				},
				N = function(t) {
					F.html(Math.round(t.invoice)), R.html(Math.round(t.moms)), L.html(Math.round(t.invoiceAmount)), B.html(Math.round(t.socialFeeAmount)), U.html(Math.round(t.brutto)), z.html(Math.round(t.tax)), j.html(Math.round(t.commission)), q.html(Math.round(t.netto))
				},
				O = function() {
					var t = H(e, b());
					N(t)
				},
				H = function(t, e) {
					var i = {};
					return i.invoice = t, i.moms = parseInt(t * (_() / 100)), i.invoiceAmount = t + i.moms, i.invoiceValue = t * (1 - e.fee / 100), i.commission = t - i.invoiceValue, i.brutto = i.invoiceValue / (1 + e.payrolltax / 100), i.socialFeeAmount = i.brutto * (e.payrolltax / 100), i.netto = i.brutto * (1 - e.tax / 100), i.tax = i.brutto - i.netto, i.netto = Math.round(i.netto / w()) * w(), i
				};
			if (a.length > 0) {
				u = JSON.parse(l.elems.calcTableWrapper.attr("data-calculator-settings")), i = $(".your-money"), s = $(".ff"), n = $(".taxes"), o = $(".value"), r = $(".total");
				var F, R, L, B, U, z, j, q;
				F = $(".table-invoice"), R = $(".table-moms"), L = $(".table-invoice-amount"), B = $(".table-social-fee"), U = $(".table-brutto"), z = $(".table-tax"), j = $(".table-ff-commission"), q = $(".table-salary"), $(".drag-btn").draggable({
					containment: "parent",
					axis: "x",
					scroll: !1,
					drag: function(t, e) {
						P(e.position.left)
					}
				}), P(-1), k(x())
			}
		},
		setPayDay: function() {
			var t, e, i, s;
			if (t = $(".pay-day"), e = 5, i = moment(), s = {
					sv: ["måndag", "tisdag", "onsdag", "torsdag", "fredag", "lördag", "söndag"],
					en: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
				}, t.length > 0)
				for (; e > 0;) i = i.add(1, "days"), 6 !== i.isoWeekday() && 7 !== i.isoWeekday() && e--;
			t.text(s[currentLang][i.isoWeekday() - 1] + " " + i.format("D/M"))
		},
		startPageSlider: function() {
			var t, e;
			t = $(".network-carousel"), e = t.find("li").length, e > 1 && (t.slick({
				slidesToShow: 2,
				slidesToScroll: 2,
				slidesPerRow: 10,
				centerMode: !0,
				appendArrows: !1,
				responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				}, {
					breakpoint: 590,
					centerMode: !1,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}]
			}), $(".start-slider-next").on("click", function() {
				t.slick("slickNext")
			}), $(".start-slider-prev").on("click", function() {
				t.slick("slickPrev")
			}))
		},
		startPagePuffSlider: function() {
			if (this.browserWidth < 768) {
				var t = $(".puff-slider");
				t.slick({
					appendArrows: !1
				}), $(".prev-puff").on("click", function() {
					t.slick("slickNext")
				}), $(".next-puff").on("click", function() {
					t.slick("slickPrev")
				})
			}
		},
		perksSlider: function() {
			if (this.browserWidth < 768) {
				var t, e;
				t = $(".perks-slider"), e = $(".perks-slider-nav li"), t.slick({
					appendArrows: !1,
					draggable: !1,
					fade: !0
				}), e.on("click", function(i) {
					var s, n;
					s = $(i.currentTarget), n = parseInt(s.data("id")), e.removeClass("active"), s.addClass("active"), t.slick("slickGoTo", n)
				})
			}
		},
		testimonialSlider: function() {
			var t, e;
			t = $(".testimonial-slider"), e = $(".testimonial-background-wrapper"), t.slick({
				appendArrows: !1,
				dots: !0,
				asNavFor: ".testimonial-background-wrapper",
				autoplay: !0,
				autoplaySpeed: 5e3,
				dotsClass: "slick-dots"
			}), e.slick({
				appendArrows: !1,
				draggable: !1,
				fade: !0,
				autoplay: !0,
				autoplaySpeed: 5e3
			}), t.on("click.slick", ".slick-dots", function(i) {
				t.slick("slickPause"), e.slick("slickPause")
			})
		},
		importantInfo: function() {
			var t, e;
			e = $(".start-info"), e.length > 0 && (t = $(".start-info .close-info"), t.on("click", function() {
				e.slideUp()
			}))
		},
		toggleCalcTable: function() {
			"none" === this.elems.calcTableWrapper.css("display") ? (this.elems.calcTableHiddenBtnText.hide(), this.elems.calcTableShownBtnText.show()) : (this.elems.calcTableHiddenBtnText.show(), this.elems.calcTableShownBtnText.hide()), this.elems.calcTableWrapper.slideToggle()
		},
		toggleDidYouKnowTable: function() {
			var t, e;
			t = $(".start-know"), t.length > 0 && (e = t.find(".toggle-know-table"), e.on("click", function(e) {
				t.toggleClass("table-shown"), e.preventDefault()
			}))
		},
		preventContentEditableReturnKeypress: function() {
			$(".start-calc span[contenteditable]").keydown(function(t) {
				if (13 === t.keyCode) return !1
			})
		},
		init: function() {
			this.initDragButton(), this.startPageSlider(), this.startPagePuffSlider(), this.testimonialSlider(), this.perksSlider(), this.setPayDay(), this.importantInfo(), this.toggleDidYouKnowTable(), this.preventContentEditableReturnKeypress(), $(".toggle-calc-table").on("click", this.toggleCalcTable.bind(this))
		}
	};
	$(window).load(function() {
		t.init();
	})
}();


var Utils = {
	validateForm: function(t) {
		var e, i, s, n;
		return e = t.find("input"), i = !0, s = t.find("textarea"), n = function(t) {
			t.prop("required") && t.val().length < t.prop("minLength") ? (t.next().show(), i = !1) : t.prop("required") && t.val().length >= t.prop("minLength") && t.next().hide()
		}, e.each(function(t, e) {
			n($(e))
		}), s.each(function(t, e) {
			n($(e))
		}), i
	},
	scrollToElem: function(t, e) {
		e || (e = 0), $("html, body").css("height", "auto"), $("html, body").animate({
			scrollTop: t.offset().top - e
		}, 1e3)
	},
	validateDecimal: function(t) {
		var e = t.toString();
		return parseFloat(e.replace(/,/g, "."))
	},
	getParameterByName: function(t, e) {
		e || (e = window.location.href), t = t.replace(/[\[\]]/g, "\\$&");
		var i = new RegExp("[?&]" + t + "(=([^&#]*)|&|#|$)"),
			s = i.exec(e);
		return s ? s[2] ? decodeURIComponent(s[2].replace(/\+/g, " ")) : "" : null
	},
	formatNumber: function(t, e) {
		return t.toFixed(e).replace(/./g, function(t, e, i) {
			return e && "." !== t && (i.length - e) % 3 === 0 ? " " + t : t
		})
	},
	toMoney: function(t) {
		return this.formatNumber(t, 0)
	},
	between: function(t, e, i) {
		return Math.max(e, Math.min(i, t))
	},
	decodeUriString: function(t) {
		t = t.replace(/\+/g, "%20");
		for (var e = t.split("%"), i = e[0], s = 1; s < e.length; s++) i += String.fromCharCode(parseInt(e[s].substring(0, 2), 16)) + e[s].substring(2);
		return i
	}
};