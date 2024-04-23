<template>
    <section
        class="p-5 custom_scroll"
        style="height: calc(100vh - 90px); overflow: auto"
    >
        <div class="row">
            <div class="col-xl-12 mb-4 col-lg-12 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistics</h5>
                            <!-- <small class="text-muted">Updated 1 month ago</small> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{ get_dashboard_stat.total_sales }}
                                        </h5>
                                        <small>Sales</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-info me-3 p-2"
                                    >
                                        <i class="fa-solid fa-user-group"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_customer
                                            }}
                                        </h5>
                                        <small>Customers</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-danger me-3 p-2"
                                    >
                                        <i
                                            class="fa-solid fa-cart-shopping"
                                        ></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_product
                                            }}
                                        </h5>
                                        <small>Products</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-success me-3 p-2"
                                    >
                                        <i class="fa-solid fa-money-bills"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">$9745</h5>
                                        <small>Revenue</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-shop-lock"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_pending_order
                                            }}
                                        </h5>
                                        <small>Pending Orders</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-info me-3 p-2"
                                    >
                                        <i class="fa-solid fa-list"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_categories
                                            }}
                                        </h5>
                                        <small>Total Categories</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-danger me-3 p-2"
                                    >
                                        <i class="fa-solid fa-shop"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_sales_this_month
                                            }}
                                        </h5>
                                        <small
                                            >Total sales for this month</small
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-success me-3 p-2"
                                    >
                                        <i class="fa-solid fa-money-bills"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.total_sales_today
                                            }}
                                        </h5>
                                        <small>Total sales for today</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i
                                            class="fa-solid fa-boxes-packing"
                                        ></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.top_selling_product
                                            }}
                                        </h5>
                                        <small>Top Selling Products</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-info me-3 p-2"
                                    >
                                        <i class="fa-solid fa-box-archive"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                get_dashboard_stat.less_selling_product
                                            }}
                                        </h5>
                                        <small>Less selling products</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 mb-4 col-lg-12 col-12">
                <div class="card h-100">
                    <div class="card-header d-block">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Accounts</h5>
                            <!-- <small class="text-muted">Updated 1 month ago</small> -->
                            <div class="d-flex gap-2">
                                <input
                                    class="form-control"
                                    type="date"
                                    v-model="start_date"
                                />
                                <input
                                    class="form-control"
                                    type="date"
                                    v-model="end_date"
                                />
                                <button
                                    @click.prevent="getAccountStatement"
                                    class="btn btn-sm btn-outline-info"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                accounts_statistics.data.total_income
                                            }}
                                        </h5>
                                        <small>Total Income</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                accounts_statistics.data.total_expense
                                            }}
                                        </h5>
                                        <small>Total Expense</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                accounts_statistics.data.income_from_order
                                            }}
                                        </h5>
                                        <small>Income from Order</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                accounts_statistics.data.net_profit
                                            }}
                                        </h5>
                                        <small>Net Profit</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="badge rounded-pill bg-label-primary me-3 p-2"
                                    >
                                        <i class="fa-solid fa-chart-pie"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">
                                            {{
                                                accounts_statistics.data.profit_loss_from_order
                                            }}
                                        </h5>
                                        <small :class="accounts_statistics.data.profit_loss_from_order < 0? 'text-warning': 'text-success'">Profit or Loss Only fromOrder</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4 col-lg-6 col-6 col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Total monthly sales</h5>
                            <!-- <small class="text-muted">Updated 1 month ago</small> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <Bar
                                id="my-chart-id"
                                :options="chartOptions"
                                :data="chartData"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4 col-lg-6 col-6 col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">
                                Total monthly revenue
                            </h5>
                            <!-- <small class="text-muted">Updated 1 month ago</small> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <LineChart
                                id="line-chart"
                                :options="LinechartOptions"
                                :data="LinechartData"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Accounts</h5>
                            <!-- <small class="text-muted">Updated 1 month ago</small> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Income</th>
                                    <th>Expense</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="i in all_account_category.data"
                                    :key="i.id"
                                >
                                    <td>{{ i.title }}</td>
                                    <td>
                                        {{ i.account_log_income_sum_amount }}
                                    </td>
                                    <td>
                                        {{ i.account_log_expense_sum_amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Bar, Line as LineChart } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LineElement,
    LinearScale,
    PointElement,
} from "chart.js";
import { mapActions, mapGetters, mapMutations } from "vuex";
import moment from "moment";
ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LineElement,
    LinearScale,
    PointElement
);

export default {
    components: { Bar, LineChart },
    data() {
        return {
            chartData: {
                labels: ["January", "February", "March"],
                datasets: [
                    {
                        data: [40, 20, 12],
                        backgroundColor: "#695fd7",
                        label: "Monthly sales",
                    },
                ],
            },

            LinechartData: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                ],
                datasets: [
                    {
                        label: "Monthly revenue",
                        backgroundColor: "#07b8d0",
                        borderColor: "#07b8d0",
                        data: [40, 39, 10, 40, 39, 80, 40],
                    },
                ],
            },

            LinechartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },

            chartOptions: {
                responsive: true,
            },

            all_account_category: [],
            accounts_statistics: [],
            start_date: "",
            end_date: "",
        };
    },
    methods: {
        ...mapActions(["fetch_dashboard_stats"]),

        getAccountStatement: async function () {
            this.accounts_statistics = await axios.post("/dashboard/account-reports",{start_date: this.start_date,end_date: this.end_date,});
        },
    },

    created: async function () {
        await this.fetch_dashboard_stats();
        this.all_account_category = await axios.get(
            "/account-category/income-expense"
        );
        this.start_date = moment().subtract("30 days").format("YYYY-MM-DD");
        this.end_date = moment().subtract("0 days").format("YYYY-MM-DD");
        this.getAccountStatement();
    },

    computed: {
        ...mapGetters(["get_dashboard_stat"]),
    },
};
</script>

<style scoped>
.badge {
    --bs-badge-padding-x: 1em;
    --bs-badge-padding-y: 0.49em;
    --bs-badge-font-size: 0.81em;
    --bs-badge-font-weight: 600;
    --bs-badge-color: #fff;
    --bs-badge-border-radius: 0.25rem;
    display: inline-block;
    padding: var(--bs-badge-padding-y) var(--bs-badge-padding-x);
    font-size: var(--bs-badge-font-size);
    font-weight: var(--bs-badge-font-weight);
    line-height: 1;
    color: var(--bs-badge-color);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: var(--bs-badge-border-radius);
}

.badge:empty {
    display: none;
}

.btn .badge {
    position: relative;
    top: -1px;
}

.rounded-circle {
    border-radius: 50% !important;
}

.rounded-pill {
    border-radius: 50rem !important;
}

.rounded-top {
    border-top-left-radius: 0.375rem !important;
    border-top-right-radius: 0.375rem !important;
}

.rounded-bottom {
    border-bottom-right-radius: 0.375rem !important;
    border-bottom-left-radius: 0.375rem !important;
}

.row-bordered.row-border-light > .col::before,
.row-bordered.row-border-light > .col::after,
.row-bordered.row-border-light > [class^="col-"]::before,
.row-bordered.row-border-light > [class^="col-"]::after,
.row-bordered.row-border-light > [class*=" col-"]::before,
.row-bordered.row-border-light > [class*=" col-"]::after,
.row-bordered.row-border-light > [class^="col "]::before,
.row-bordered.row-border-light > [class^="col "]::after,
.row-bordered.row-border-light > [class*=" col "]::before,
.row-bordered.row-border-light > [class*=" col "]::after,
.row-bordered.row-border-light > [class$=" col"]::before,
.row-bordered.row-border-light > [class$=" col"]::after,
.row-bordered.row-border-light > [class="col"]::before,
.row-bordered.row-border-light > [class="col"]::after {
    border-color: rgba(255, 255, 255, 0.8);
}

[dir="rtl"] .row-bordered > .col::after,
[dir="rtl"] .row-bordered > [class^="col-"]::after,
[dir="rtl"] .row-bordered > [class*=" col-"]::after,
[dir="rtl"] .row-bordered > [class^="col "]::after,
[dir="rtl"] .row-bordered > [class*=" col "]::after,
[dir="rtl"] .row-bordered > [class$=" col"]::after,
[dir="rtl"] .row-bordered > [class="col"]::after {
    left: auto;
    right: -1px;
}

.bg-label-secondary {
    background-color: #424659 !important;
    color: #a8aaae !important;
}

.bg-label-success {
    background-color: #2e4b4f !important;
    color: #28c76f !important;
}

.bg-label-info {
    background-color: #274c62 !important;
    color: #00cfe8 !important;
}

.bg-label-warning {
    background-color: #504448 !important;
    color: #ff9f43 !important;
}

.bg-label-danger {
    background-color: #4d384b !important;
    color: #ea5455 !important;
}

.bg-label-light {
    background-color: #32364c !important;
    color: #44475b !important;
}

.bg-label-dark {
    background-color: #4a4d61 !important;
    color: #d7d8de !important;
}

.bg-label-gray {
    background-color: rgba(70, 74, 94, 0.968) !important;
    color: rgba(255, 255, 255, 0.8) !important;
}

.bg-dark {
    color: #fff;
    background-color: #44475b !important;
}

.bg-label-dark {
    background-color: #32364c !important;
    color: #44475b !important;
}

a.bg-dark:hover,
a.bg-dark:focus {
    background-color: rgba(0, 0, 0, 0.65) !important;
}

a.bg-light:hover,
a.bg-light:focus {
    background-color: rgba(255, 255, 255, 0.6) !important;
}

a.bg-lighter:hover,
a.bg-lighter:focus {
    background-color: rgba(255, 255, 255, 0.8) !important;
}

a.bg-lightest:hover,
a.bg-lightest:focus {
    background-color: rgba(255, 255, 255, 0.03) !important;
}
.bg-label-primary {
    background-color: #3a3b64 !important;
    color: #7367f0 !important;
}
</style>
