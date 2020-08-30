<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>

<div class="j-header">
    <div class="header">
        <div class="logo">
            <img src="http://1.gravatar.com/avatar/7ced2011e7c7d49a69d687d8600273b2?s=96&d=monsterid&r=g">
            <span>wellcome</span>
        </div>
        <ul>
            <li>
                <a id="linkHome" class="link <?php if($this->is('index')): ?>active<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>">首页</a>
            </li>

            <li>
                <a class="cate" href="javascript:void(0)">分类</a>
                <div class="submenu">
                    <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                    <?php while ($category->next()) : ?>
                        <a <?php if($this->is('category', $category->slug)): ?> class="active" <?php endif; ?> href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
                    <?php endwhile; ?>
                </div>
            </li>

            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while ($pages->next()) : ?>
                <li>
                    <a class="link <?php if($this->is('page', $pages->slug)): ?>active<?php endif; ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
        <form id="searchForm" method="get" action="<?php $this->options->siteUrl(); ?>">
            <input id="searchInput" name="s" autocomplete="off" type="text" placeholder="请输入关键字..." />
            <button>Search</button>
            <svg t="1597901356337" id="clearInputIcon" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1842" width="32" height="32">
                <path d="M512 1255.489906" p-id="1843"></path>
                <path d="M718.519288 688.227064 543.827304 513.637418l174.180292-174.180292c8.801119-8.801119 8.801119-23.128523 0-31.827304-8.801119-8.801119-23.128523-8.801119-31.827304 0L512 481.810114 337.819708 307.629822c-8.801119-8.801119-23.230861-8.596442-31.929642 0.102339l0.102339-0.102339c-8.801119 8.801119-8.698781 23.026184 0.102339 31.827304l174.180292 174.180292L305.58305 688.227064c-8.801119 8.801119-8.801119 23.128523 0 31.827304 8.801119 8.801119 23.128523 8.801119 31.827304 0L512 545.464721 686.691985 720.054367c8.801119 8.801119 22.923846 8.903458 31.724965 0.102339l0.102339-0.102339C727.218069 711.355587 727.218069 697.028183 718.519288 688.227064z" p-id="1844"></path>
            </svg>
        </form>
    </div>
</div>