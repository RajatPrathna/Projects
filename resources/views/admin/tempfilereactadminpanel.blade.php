import React, { useState } from 'react';
import { BarChart, Bar, LineChart, Line, PieChart, Pie, Cell, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';
import { TrendingUp, DollarSign, ShoppingCart, Users } from 'lucide-react';

const AdminDashboard = () => {
  const [selectedYear, setSelectedYear] = useState('2024');
  const [compareMode, setCompareMode] = useState(false);
  const [compareYear1, setCompareYear1] = useState('2024');
  const [compareYear2, setCompareYear2] = useState('2023');

  // Sample data for different years
  const salesData = {
    '2024': [
      { month: 'Jan', sales: 45000, orders: 320, customers: 285 },
      { month: 'Feb', sales: 52000, orders: 380, customers: 340 },
      { month: 'Mar', sales: 48000, orders: 350, customers: 310 },
      { month: 'Apr', sales: 61000, orders: 420, customers: 390 },
      { month: 'May', sales: 55000, orders: 390, customers: 350 },
      { month: 'Jun', sales: 67000, orders: 450, customers: 410 },
      { month: 'Jul', sales: 72000, orders: 490, customers: 440 },
      { month: 'Aug', sales: 68000, orders: 470, customers: 425 },
      { month: 'Sep', sales: 71000, orders: 485, customers: 450 },
      { month: 'Oct', sales: 76000, orders: 510, customers: 475 },
      { month: 'Nov', sales: 82000, orders: 550, customers: 510 },
      { month: 'Dec', sales: 95000, orders: 620, customers: 580 }
    ],
    '2023': [
      { month: 'Jan', sales: 38000, orders: 280, customers: 250 },
      { month: 'Feb', sales: 42000, orders: 310, customers: 280 },
      { month: 'Mar', sales: 45000, orders: 330, customers: 295 },
      { month: 'Apr', sales: 51000, orders: 370, customers: 340 },
      { month: 'May', sales: 48000, orders: 350, customers: 320 },
      { month: 'Jun', sales: 58000, orders: 410, customers: 375 },
      { month: 'Jul', sales: 63000, orders: 440, customers: 400 },
      { month: 'Aug', sales: 59000, orders: 420, customers: 385 },
      { month: 'Sep', sales: 64000, orders: 450, customers: 410 },
      { month: 'Oct', sales: 68000, orders: 475, customers: 435 },
      { month: 'Nov', sales: 73000, orders: 500, customers: 465 },
      { month: 'Dec', sales: 84000, orders: 570, customers: 530 }
    ],
    '2022': [
      { month: 'Jan', sales: 32000, orders: 245, customers: 220 },
      { month: 'Feb', sales: 35000, orders: 270, customers: 245 },
      { month: 'Mar', sales: 38000, orders: 290, customers: 260 },
      { month: 'Apr', sales: 43000, orders: 320, customers: 295 },
      { month: 'May', sales: 41000, orders: 310, customers: 285 },
      { month: 'Jun', sales: 49000, orders: 360, customers: 330 },
      { month: 'Jul', sales: 54000, orders: 395, customers: 360 },
      { month: 'Aug', sales: 51000, orders: 375, customers: 345 },
      { month: 'Sep', sales: 56000, orders: 405, customers: 370 },
      { month: 'Oct', sales: 60000, orders: 430, customers: 395 },
      { month: 'Nov', sales: 65000, orders: 460, customers: 425 },
      { month: 'Dec', sales: 75000, orders: 520, customers: 485 }
    ]
  };

  const categoryData = [
    { name: 'Electronics', value: 35, amount: 245000 },
    { name: 'Clothing', value: 25, amount: 175000 },
    { name: 'Home & Garden', value: 20, amount: 140000 },
    { name: 'Sports', value: 12, amount: 84000 },
    { name: 'Books', value: 8, amount: 56000 }
  ];

  const COLORS = ['#6366f1', '#8b5cf6', '#ec4899', '#f59e0b', '#10b981'];

  const currentData = salesData[selectedYear];
  const compareData1 = salesData[compareYear1];
  const compareData2 = salesData[compareYear2];

  // Prepare comparison data
  const comparisonData = currentData.map((item, index) => ({
    month: item.month,
    [compareYear1]: compareData1[index].sales,
    [compareYear2]: compareData2[index].sales
  }));

  // Calculate totals
  const calculateTotals = (data) => ({
    totalSales: data.reduce((sum, item) => sum + item.sales, 0),
    totalOrders: data.reduce((sum, item) => sum + item.orders, 0),
    totalCustomers: data.reduce((sum, item) => sum + item.customers, 0),
    avgOrderValue: data.reduce((sum, item) => sum + item.sales, 0) / data.reduce((sum, item) => sum + item.orders, 0)
  });

  const totals = calculateTotals(currentData);

  return (
    <div className="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
      {/* Header */}
      <div className="bg-slate-800/50 backdrop-blur-sm border-b border-purple-500/20 sticky top-0 z-10">
        <div className="max-w-7xl mx-auto px-6 py-4">
          <div className="flex items-center justify-between">
            <h1 className="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">
              Sales Dashboard
            </h1>
            <div className="flex gap-4 items-center">
              <button
                onClick={() => setCompareMode(!compareMode)}
                className={`px-4 py-2 rounded-lg font-medium transition-all ${
                  compareMode
                    ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/50'
                    : 'bg-slate-700 text-gray-300 hover:bg-slate-600'
                }`}
              >
                {compareMode ? 'Exit Compare' : 'Compare Years'}
              </button>
              {!compareMode && (
                <select
                  value={selectedYear}
                  onChange={(e) => setSelectedYear(e.target.value)}
                  className="px-4 py-2 bg-slate-700 text-white rounded-lg border border-purple-500/30 focus:outline-none focus:border-purple-500"
                >
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                </select>
              )}
              {compareMode && (
                <>
                  <select
                    value={compareYear1}
                    onChange={(e) => setCompareYear1(e.target.value)}
                    className="px-4 py-2 bg-slate-700 text-white rounded-lg border border-purple-500/30 focus:outline-none focus:border-purple-500"
                  >
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                  </select>
                  <span className="text-purple-400 font-medium">vs</span>
                  <select
                    value={compareYear2}
                    onChange={(e) => setCompareYear2(e.target.value)}
                    className="px-4 py-2 bg-slate-700 text-white rounded-lg border border-purple-500/30 focus:outline-none focus:border-purple-500"
                  >
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                  </select>
                </>
              )}
            </div>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 py-8">
        {/* Stats Cards */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
          <div className="bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl p-6 shadow-xl">
            <div className="flex items-center justify-between">
              <div>
                <p className="text-purple-200 text-sm font-medium">Total Sales</p>
                <p className="text-white text-3xl font-bold mt-2">
                  ${(totals.totalSales / 1000).toFixed(1)}k
                </p>
              </div>
              <div className="bg-white/20 p-3 rounded-lg">
                <DollarSign className="w-8 h-8 text-white" />
              </div>
            </div>
          </div>

          <div className="bg-gradient-to-br from-pink-600 to-pink-700 rounded-xl p-6 shadow-xl">
            <div className="flex items-center justify-between">
              <div>
                <p className="text-pink-200 text-sm font-medium">Total Orders</p>
                <p className="text-white text-3xl font-bold mt-2">{totals.totalOrders}</p>
              </div>
              <div className="bg-white/20 p-3 rounded-lg">
                <ShoppingCart className="w-8 h-8 text-white" />
              </div>
            </div>
          </div>

          <div className="bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-xl p-6 shadow-xl">
            <div className="flex items-center justify-between">
              <div>
                <p className="text-indigo-200 text-sm font-medium">Total Customers</p>
                <p className="text-white text-3xl font-bold mt-2">{totals.totalCustomers}</p>
              </div>
              <div className="bg-white/20 p-3 rounded-lg">
                <Users className="w-8 h-8 text-white" />
              </div>
            </div>
          </div>

          <div className="bg-gradient-to-br from-violet-600 to-violet-700 rounded-xl p-6 shadow-xl">
            <div className="flex items-center justify-between">
              <div>
                <p className="text-violet-200 text-sm font-medium">Avg Order Value</p>
                <p className="text-white text-3xl font-bold mt-2">
                  ${totals.avgOrderValue.toFixed(0)}
                </p>
              </div>
              <div className="bg-white/20 p-3 rounded-lg">
                <TrendingUp className="w-8 h-8 text-white" />
              </div>
            </div>
          </div>
        </div>

        {/* Charts */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
          {/* Sales Chart */}
          <div className="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-purple-500/20">
            <h3 className="text-xl font-bold text-white mb-4">
              {compareMode ? `Sales Comparison: ${compareYear1} vs ${compareYear2}` : `Monthly Sales - ${selectedYear}`}
            </h3>
            <ResponsiveContainer width="100%" height={300}>
              {compareMode ? (
                <BarChart data={comparisonData}>
                  <CartesianGrid strokeDasharray="3 3" stroke="#374151" />
                  <XAxis dataKey="month" stroke="#9ca3af" />
                  <YAxis stroke="#9ca3af" />
                  <Tooltip
                    contentStyle={{ backgroundColor: '#1f2937', border: '1px solid #6366f1', borderRadius: '8px' }}
                    labelStyle={{ color: '#f3f4f6' }}
                  />
                  <Legend />
                  <Bar dataKey={compareYear1} fill="#8b5cf6" name={compareYear1} />
                  <Bar dataKey={compareYear2} fill="#ec4899" name={compareYear2} />
                </BarChart>
              ) : (
                <BarChart data={currentData}>
                  <CartesianGrid strokeDasharray="3 3" stroke="#374151" />
                  <XAxis dataKey="month" stroke="#9ca3af" />
                  <YAxis stroke="#9ca3af" />
                  <Tooltip
                    contentStyle={{ backgroundColor: '#1f2937', border: '1px solid #6366f1', borderRadius: '8px' }}
                    labelStyle={{ color: '#f3f4f6' }}
                  />
                  <Legend />
                  <Bar dataKey="sales" fill="#8b5cf6" name="Sales ($)" />
                </BarChart>
              )}
            </ResponsiveContainer>
          </div>

          {/* Orders & Customers Trend */}
          {/* <div className="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-purple-500/20">
            <h3 className="text-xl font-bold text-white mb-4">Orders & Customers Trend</h3>
            <ResponsiveContainer width="100%" height={300}>
              <LineChart data={currentData}>
                <CartesianGrid strokeDasharray="3 3" stroke="#374151" />
                <XAxis dataKey="month" stroke="#9ca3af" />
                <YAxis stroke="#9ca3af" />
                <Tooltip
                  contentStyle={{ backgroundColor: '#1f2937', border: '1px solid #6366f1', borderRadius: '8px' }}
                  labelStyle={{ color: '#f3f4f6' }}
                />
                <Legend />
                <Line type="monotone" dataKey="orders" stroke="#6366f1" strokeWidth={2} name="Orders" />
                <Line type="monotone" dataKey="customers" stroke="#ec4899" strokeWidth={2} name="Customers" />
              </LineChart>
            </ResponsiveContainer>
          </div> */}

          {/* Year/Month Comparison for Sales */}
          <div className="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-purple-500/20">
            <div className="flex items-center justify-between mb-4">
              <h3 className="text-xl font-bold text-white">Sales Comparison</h3>
              <div className="flex gap-3">
                <select
                  value={compareYear1}
                  onChange={(e) => setCompareYear1(e.target.value)}
                  className="px-3 py-1.5 bg-slate-700 text-white text-sm rounded-lg border border-purple-500/30 focus:outline-none focus:border-purple-500"
                >
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                </select>
                <span className="text-purple-400 font-medium self-center">vs</span>
                <select
                  value={compareYear2}
                  onChange={(e) => setCompareYear2(e.target.value)}
                  className="px-3 py-1.5 bg-slate-700 text-white text-sm rounded-lg border border-purple-500/30 focus:outline-none focus:border-purple-500"
                >
                  <option value="2024">2024</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                </select>
              </div>
            </div>
            <ResponsiveContainer width="100%" height={300}>
              <LineChart data={comparisonData}>
                <CartesianGrid strokeDasharray="3 3" stroke="#374151" />
                <XAxis dataKey="month" stroke="#9ca3af" />
                <YAxis stroke="#9ca3af" />
                <Tooltip
                  contentStyle={{ backgroundColor: '#1f2937', border: '1px solid #6366f1', borderRadius: '8px' }}
                  labelStyle={{ color: '#f3f4f6' }}
                />
                <Legend />
                <Line 
                  type="monotone" 
                  dataKey={compareYear1} 
                  stroke="#6366f1" 
                  strokeWidth={3} 
                  name={`Sales ${compareYear1}`}
                  dot={{ fill: '#6366f1', r: 4 }}
                />
                <Line 
                  type="monotone" 
                  dataKey={compareYear2} 
                  stroke="#ec4899" 
                  strokeWidth={3} 
                  name={`Sales ${compareYear2}`}
                  dot={{ fill: '#ec4899', r: 4 }}
                />
              </LineChart>
            </ResponsiveContainer>
          </div>
        </div>

        {/* Category Distribution */}
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div className="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-purple-500/20">
            <h3 className="text-xl font-bold text-white mb-4">Sales by Category</h3>
            <ResponsiveContainer width="100%" height={300}>
              <PieChart>
                <Pie
                  data={categoryData}
                  cx="50%"
                  cy="50%"
                  labelLine={false}
                  label={({ name, percent }) => `${name}: ${(percent * 100).toFixed(0)}%`}
                  outerRadius={100}
                  fill="#8884d8"
                  dataKey="value"
                >
                  {categoryData.map((entry, index) => (
                    <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                  ))}
                </Pie>
                <Tooltip
                  contentStyle={{ backgroundColor: '#1f2937', border: '1px solid #6366f1', borderRadius: '8px' }}
                  labelStyle={{ color: '#f3f4f6' }}
                />
              </PieChart>
            </ResponsiveContainer>
          </div>

          {/* Category Details */}
          <div className="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-purple-500/20">
            <h3 className="text-xl font-bold text-white mb-4">Category Breakdown</h3>
            <div className="space-y-4">
              {categoryData.map((category, index) => (
                <div key={category.name} className="flex items-center justify-between">
                  <div className="flex items-center gap-3">
                    <div
                      className="w-4 h-4 rounded"
                      style={{ backgroundColor: COLORS[index] }}
                    ></div>
                    <span className="text-gray-300 font-medium">{category.name}</span>
                  </div>
                  <div className="text-right">
                    <p className="text-white font-bold">${(category.amount / 1000).toFixed(1)}k</p>
                    <p className="text-gray-400 text-sm">{category.value}%</p>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>

        {/* Totals Summary */}
        <div className="mt-8 bg-gradient-to-r from-purple-900/50 to-pink-900/50 backdrop-blur-sm rounded-xl p-8 border border-purple-500/30">
          <h3 className="text-2xl font-bold text-white mb-6 text-center">
            Year {compareMode ? `${compareYear1} vs ${compareYear2}` : selectedYear} Summary
          </h3>
          <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div className="text-center">
              <p className="text-purple-300 text-sm font-medium mb-2">Total Revenue</p>
              <p className="text-white text-3xl font-bold">${(totals.totalSales / 1000).toFixed(1)}k</p>
            </div>
            <div className="text-center">
              <p className="text-purple-300 text-sm font-medium mb-2">Total Orders</p>
              <p className="text-white text-3xl font-bold">{totals.totalOrders.toLocaleString()}</p>
            </div>
            <div className="text-center">
              <p className="text-purple-300 text-sm font-medium mb-2">Unique Customers</p>
              <p className="text-white text-3xl font-bold">{totals.totalCustomers.toLocaleString()}</p>
            </div>
            <div className="text-center">
              <p className="text-purple-300 text-sm font-medium mb-2">Avg Order Value</p>
              <p className="text-white text-3xl font-bold">${totals.avgOrderValue.toFixed(2)}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AdminDashboard;