Cufon.replace("span,p,h1,h2,h3,h4,h5,h6,label", {
	textShadow : "1px 1px 1px rgba(0, 0, 0, 0.2)"
});
$(function() {
	var b = $("#loading");
	var a = $("#nav");
	var f = $("#main").children("img:first");
	$("<img>").load(function() {
		b.hide();
		f.fadeIn(3000);
		setTimeout(function() {
			var h = document.documentElement.clientHeight;
			var g = $("#nav").height() +10;
			a.animate({
				top : h - g
			}, 1000)
		}, 1000)
	}).attr("src", f.attr("src"));
	e();
	function e() {
		a.children("li.album").each(function() {
			var g = $(this);
			var i = g.find(".thumbs_wrapper");
			var h = i.children(":first");
			var j = h.find("img").length * 183;
			h.css("width", j + "px");
			c(i, h)
		})
	}
	a.find(".arrow_down").load("click", function() {
		var i = $(this);
		d();
		i.addClass("arrow_up").removeClass("arrow_down");
		var g = i.closest("li");
		g.addClass("current").animate({
			height : "170px"
		}, 200);
		var h = i.parent().next();
		h.show(200)
	});
	a.find(".arrow_down").live("click", function() {
		var i = $(this);
		d();
		i.addClass("arrow_up").removeClass("arrow_down");
		var g = i.closest("li");
		g.addClass("current").animate({
			height : "170px"
		}, 200);
		var h = i.parent().next();
		h.show(200)
	});
	a.find(".arrow_up").live("click", function() {
		var g = $(this);
		g.addClass("arrow_down").removeClass("arrow_up");
		d()
	});
	a.find(".thumbs img").bind("click", function() {
		var g = $(this);
		b.show();
		$('<img class="preview"/>').load(function() {
			var h = $(this);
			var i = $("#main").children("img:first");
			h.insertBefore(i);
			b.hide();
			i.fadeOut(2000, function() {
				$(this).remove()
			})
		}).attr("src", g.attr("alt"))
	}).bind("mouseenter", function() {
		$(this).stop().animate({
			opacity : "1"
		})
	}).bind("mouseleave", function() {
		$(this).stop().animate({
			opacity : "0.9"
		})
	});
	function d() {
		a.find("li.current").animate({
			height : "50px"
		}, 400, function() {
			$(this).removeClass("current")
		}).find(".thumbs_wrapper").hide(200).andSelf().find(".link span")
				.addClass("arrow_down").removeClass("arrow_up")
	}
	function c(i, k) {
		var g = 800;
		var h = i.width();
		i.css({
			overflow : "hidden"
		});
		var j = k.find("img:last");
		i.scrollLeft(0);
		i.unbind("mousemove").bind("mousemove", function(n) {
			var l = j[0].offsetLeft + j.outerWidth() + 2 * g;
			var m = (n.pageX - i.offset().left) * (l - h) / h - g;
			i.scrollLeft(m)
		})
	}
});
$(function() {
	$("#menu > li").bind("mouseenter", function() {
		var a = $(this);
		a.find("img").stop(true).animate({
			width : "170px",
			height : "170px",
			left : "0px"
		}, 400, "easeOutBack").andSelf().find(".wrap").stop(true).animate({
			top : "140px"
		}, 500, "easeOutBack").andSelf().find(".active").stop(true).animate({
			height : "170px"
		}, 300, function() {
			var c = a.find(".box");
			if (c.length) {
				var b = "170px";
				if (a.parent().children().length == a.index() + 1) {
					b = "-170px"
				}
				c.show().animate({
					left : b
				}, 200)
			}
		})
	}).bind("mouseleave", function() {
		var a = $(this);
		var b = a.find(".box");
		if (b.length) {
			b.hide().css("left", "0px")
		}
		a.find(".active").stop(true).animate({
			height : "0px"
		}, 300).andSelf().find("img").stop(true).animate({
			width : "0px",
			height : "0px",
			left : "85px"
		}, 400).andSelf().find(".wrap").stop(true).animate({
			top : "25px"
		}, 500)
	})
});
$(window).load(
		function() {
			var b = [ "images/help/2.jpg", "images/help/3.jpg",
					"images/help/4.jpg", "images/help/5.jpg",
					"images/help/6.jpg" ];
			var a = $("body").append(
					'<div id="img-cache" style="display:none/>').children(
					"#img-cache");
			$.each(b, function(c, d) {
				$("<img/>").attr("src", d).appendTo(a)
			})
		});