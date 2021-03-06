var __defProp = Object.defineProperty,
  __getOwnPropSymbols = Object.getOwnPropertySymbols,
  __hasOwnProp = Object.prototype.hasOwnProperty,
  __propIsEnum = Object.prototype.propertyIsEnumerable,
  __defNormalProp = (e, t, r) => (t in e ? __defProp(e, t, { enumerable: !0, configurable: !0, writable: !0, value: r }) : (e[t] = r)),
  __spreadValues = (e, t) => {
    for (var r in t || (t = {})) __hasOwnProp.call(t, r) && __defNormalProp(e, r, t[r]);
    if (__getOwnPropSymbols) for (var r of __getOwnPropSymbols(t)) __propIsEnum.call(t, r) && __defNormalProp(e, r, t[r]);
    return e;
  };
!(function (e, t) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = t(require("vue"), require("chart.js")))
    : "function" == typeof define && define.amd
    ? define(["vue", "chart.js"], t)
    : ((e = "undefined" != typeof globalThis ? globalThis : e || self).Vue3ChartJs = t(e.Vue, e.chart_js));
})(this, function (e, t) {
  "use strict";
  const r = [
    "install",
    "start",
    "stop",
    "beforeInit",
    "afterInit",
    "beforeUpdate",
    "afterUpdate",
    "beforeElementsUpdate",
    "reset",
    "beforeDatasetsUpdate",
    "afterDatasetsUpdate",
    "beforeDatasetUpdate",
    "afterDatasetUpdate",
    "beforeLayout",
    "afterLayout",
    "afterLayout",
    "beforeRender",
    "afterRender",
    "resize",
    "destroy",
    "uninstall",
    "afterTooltipDraw",
    "beforeTooltipDraw",
  ];
  t.Chart.register(
    t.ArcElement,
    t.LineElement,
    t.BarElement,
    t.PointElement,
    t.BarController,
    t.BubbleController,
    t.DoughnutController,
    t.LineController,
    t.PieController,
    t.PolarAreaController,
    t.RadarController,
    t.ScatterController,
    t.CategoryScale,
    t.LinearScale,
    t.LogarithmicScale,
    t.RadialLinearScale,
    t.TimeScale,
    t.TimeSeriesScale,
    t.Decimation,
    t.Filler,
    t.Legend,
    t.Title,
    t.Tooltip
  );
  const a = e.defineComponent({
    name: "Vue3ChartJs",
    props: { type: { type: String, required: !0 }, data: { type: Object, required: !0 }, options: { type: Object, default: () => ({}) }, plugins: { type: Array, default: () => [] } },
    emits: r,
    setup(a, { emit: o }) {
      const n = e.ref(null),
        l = {
          chart: null,
          plugins: [
            r.reduce(
              (e, t) => {
                const r = (function (e, t = null) {
                  return {
                    type: e,
                    chartRef: t,
                    preventDefault() {
                      this._defaultPrevented = !0;
                    },
                    isDefaultPrevented() {
                      return !this._defaultPrevented;
                    },
                    _defaultPrevented: !1,
                  };
                })(t, n);
                return __spreadValues(
                  __spreadValues({}, e),
                  (function (e, t) {
                    return { [t.type]: () => (e(t.type, t), t.isDefaultPrevented()) };
                  })(o, r)
                );
              },
              { id: "Vue3ChartJsEventHookPlugin" }
            ),
            ...a.plugins,
          ],
          props: __spreadValues({}, a),
        },
        s = () => (l.chart ? l.chart.update() : (l.chart = new t.Chart(n.value.getContext("2d"), { type: l.props.type, data: l.props.data, options: l.props.options, plugins: l.plugins })));
      return (
        e.onMounted(() => s()),
        {
          chartJSState: l,
          chartRef: n,
          render: s,
          resize: () => l.chart && l.chart.resize(),
          update: (e = 750) => {
            (l.chart.data = __spreadValues(__spreadValues({}, l.chart.data), l.props.data)),
              (l.chart.options = __spreadValues(__spreadValues({}, l.chart.options), l.props.options)),
              l.chart.update(e);
          },
          destroy: () => {
            l.chart && (l.chart.destroy(), (l.chart = null));
          },
        }
      );
    },
    render: () => e.h("canvas", { ref: "chartRef" }),
  });
  return (
    (a.registerGlobalPlugins = (e) => {
      t.Chart.register(...e);
    }),
    (a.install = (e, t = {}) => {
      var r;
      e.component(a.name, a), (null == (r = null == t ? void 0 : t.plugins) ? void 0 : r.length) && a.registerGlobalPlugins(t.plugins);
    }),
    a
  );
});
