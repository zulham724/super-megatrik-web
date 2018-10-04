<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-home"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-file"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>


<li class="treeview">
    <a href="#"><i class="fa fa-wrench"></i> <span>Service</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('service') }}'></i> <span>Services</span></a></li>
		<li><a href='{{ backpack_url('servicelist') }}'></i> <span>Service Lists</span></a></li>
		<li><a href='{{ backpack_url('servicecategory') }}'></i> <span>Service Categories</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-cube"></i> <span>Material</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('material') }}'></i> <span>Materials</span></a></li>
		<li><a href='{{ backpack_url('materiallist') }}'></i> <span>Material Lists</span></a></li>
		<li><a href='{{ backpack_url('materialcategory') }}'></i> <span>Material Categories</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-shopping-cart"></i> <span>Order</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('order') }}'></i> <span>Orders</span></a></li>
		<li><a href='{{ backpack_url('orderstatus') }}'></i> <span>Order Statuses</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-hand-holding-usd"></i> <span>Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('transaction') }}'></i> <span>Transactions</span></a></li>
		<li><a href='{{ backpack_url('transactionstatus') }}'></i> <span>Transaction Statuses</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-user"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('user') }}'></i> <span>Users</span></a></li>
		<li><a href='{{ backpack_url('role') }}'></i> <span>Roles</span></a></li>
		<li><a href='{{ backpack_url('biodata') }}'></i> <span>Biodatas</span></a></li>
		<li><a href='{{ backpack_url('status') }}'></i> <span>Statuses</span></a></li>
		<li><a href='{{ backpack_url('userstatus') }}'></i> <span>User Statuses</span></a></li>
		<li><a href='{{ backpack_url('location') }}'></i> <span>Locations</span></a></li>
		<li><a href='{{ backpack_url('userstate') }}'></i> <span>User States</span></a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-cog"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('state') }}'></i> <span>States</span></a></li>
		<li><a href='{{ backpack_url('city') }}'></i> <span>Cities</span></a></li>
		<li><a href='{{ backpack_url('district') }}'></i> <span>Districts</span></a></li>
    </ul>
</li>

<li class="treeview">
    <a href="#"><i class="fa fa-clipboard-check"></i> <span>Content</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
		<li><a href='{{ backpack_url('content') }}'> <span>Contents</span></a></li>
		<li><a href='{{ backpack_url('contentlist') }}'> <span>Content Lists</span></a></li>
		<li><a href='{{ backpack_url('contentcategory') }}'> <span>Content Categories</span></a></li>
    </ul>
</li>