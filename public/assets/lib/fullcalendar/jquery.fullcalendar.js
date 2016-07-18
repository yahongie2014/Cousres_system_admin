! function(a) {
    "use strict";
    var b = function() {
        this.$body = a("body"), this.$modal = a("#event-modal"), this.$event = "#external-events div.external-event", this.$calendar = a("#calendar"), this.$saveCategoryBtn = a(".save-category"), this.$categoryForm = a("#add-category form"), this.$extEvents = a("#external-events"), this.$calendarObj = null
    };
    b.prototype.onDrop = function(b, c) {
        var d = this,
            e = b.data("eventObject"),
            f = b.attr("data-class"),
            g = a.extend({}, e);
        g.start = c, f && (g.className = [f]), d.$calendar.fullCalendar("renderEvent", g, !0), a("#drop-remove").is(":checked") && b.remove()
    }, b.prototype.onEventClick = function(b, c, d) {
        var e = this,
            f = a("<form></form>");
        f.append("<label>Change event name</label>"), f.append("<div class='input-group'><input class='form-control' type=text value='" + b.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>"), e.$modal.modal({
            backdrop: "static"
        }), e.$modal.find(".delete-event").show().end().find(".save-event").hide().end().find(".modal-body").empty().prepend(f).end().find(".delete-event").unbind("click").click(function() {
            e.$calendarObj.fullCalendar("removeEvents", function(a) {
                return a._id == b._id
            }), e.$modal.modal("hide")
        }), e.$modal.find("form").on("submit", function() {
            return b.title = f.find("input[type=text]").val(), e.$calendarObj.fullCalendar("updateEvent", b), e.$modal.modal("hide"), !1
        })
    }, b.prototype.onSelect = function(b, c, d) {
        var e = this;
        e.$modal.modal({
            backdrop: "static"
        });
        var f = a("<form></form>");
        f.append("<div class='row'></div>"), f.find(".row").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>").append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>").find("select[name='category']").append("<option value='bg-danger'>Danger</option>").append("<option value='bg-success'>Success</option>").append("<option value='bg-purple'>Purple</option>").append("<option value='bg-primary'>Primary</option>").append("<option value='bg-pink'>Pink</option>").append("<option value='bg-info'>Info</option>").append("<option value='bg-warning'>Warning</option></div></div>"), e.$modal.find(".delete-event").hide().end().find(".save-event").show().end().find(".modal-body").empty().prepend(f).end().find(".save-event").unbind("click").click(function() {
            f.submit()
        }), e.$modal.find("form").on("submit", function() {
            var a = f.find("input[name='title']").val(),
                d = (f.find("input[name='beginning']").val(), f.find("input[name='ending']").val(), f.find("select[name='category'] option:checked").val());
            return null !== a && 0 != a.length ? (e.$calendarObj.fullCalendar("renderEvent", {
                title: a,
                start: b,
                end: c,
                allDay: !1,
                className: d
            }, !0), e.$modal.modal("hide")) : alert("You have to give a title to your event"), !1
        }), e.$calendarObj.fullCalendar("unselect")
    }, b.prototype.enableDrag = function() {
        a(this.$event).each(function() {
            var b = {
                title: a.trim(a(this).text())
            };
            a(this).data("eventObject", b), a(this).draggable({
                zIndex: 999,
                revert: !0,
                revertDuration: 0
            })
        })
    }, b.prototype.init = function() {
        this.enableDrag();
        var b = new Date,
            c = (b.getDate(), b.getMonth(), b.getFullYear(), new Date(a.now())),
            d = [{
                title: "Hey!",
                start: new Date(a.now() + 158e6),
                className: "bg-purple"
            }, {
                title: "See John Deo",
                start: c,
                end: c,
                className: "bg-danger"
            }, {
                title: "Buy a Theme",
                start: new Date(a.now() + 338e6),
                className: "bg-primary"
            }],
            e = this;
        e.$calendarObj = e.$calendar.fullCalendar({
            slotDuration: "00:15:00",
            minTime: "08:00:00",
            maxTime: "19:00:00",
            defaultView: "month",
            handleWindowResize: !0,
            height: a(window).height() - 200,
            header: {
                left: "prev,next today",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            events: d,
            editable: !0,
            droppable: !0,
            eventLimit: !0,
            selectable: !0,
            drop: function(b) {
                e.onDrop(a(this), b)
            },
            select: function(a, b, c) {
                e.onSelect(a, b, c)
            },
            eventClick: function(a, b, c) {
                e.onEventClick(a, b, c)
            }
        }), this.$saveCategoryBtn.on("click", function() {
            var a = e.$categoryForm.find("input[name='category-name']").val(),
                b = e.$categoryForm.find("select[name='category-color']").val();
            null !== a && 0 != a.length && (e.$extEvents.append('<div class="external-event bg-' + b + '" data-class="bg-' + b + '" style="position: relative;"><i class="fa fa-move"></i>' + a + "</div>"), e.enableDrag())
        })
    }, a.CalendarApp = new b, a.CalendarApp.Constructor = b
}(window.jQuery),
function(a) {
    "use strict";
    a.CalendarApp.init()
}(window.jQuery);