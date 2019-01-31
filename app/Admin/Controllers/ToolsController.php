<?php

namespace App\Admin\Controllers;

use App\Models\Tool;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Category;

class ToolsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('工具列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑工具')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建工具')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tool);
        // 使用 with 来预加载商品类目数据，减少 SQL 查询
        $grid->model()->with(['category']);

        $grid->id('Id')->sortable();
//        $grid->category_id('Category id');
        $grid->title('名称');
        $grid->column('category.name', '类目');
        $grid->url('超链接');
//        $grid->icon('Icon');
//        $grid->description('Description');
        $grid->click_count('点击量');
//        $grid->created_at('Created at');
//        $grid->updated_at('Updated at');
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Tool::findOrFail($id));

        $show->id('Id');
        $show->category_id('Category id');
        $show->title('Title');
        $show->url('Url');
        $show->icon('Icon');
        $show->description('Description');
        $show->click_count('Click count');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tool);

//        $form->number('category_id', 'Category id');
        $form->text('title', '名称');

        // 添加一个类目字段，与之前类目管理类似，使用 Ajax 的方式来搜索添加
        $form->select('category_id', '类目')->options(function ($id) {
            $category = Category::find($id);
            if ($category) {
                return [$category->id => $category->full_name];
            }
        })->ajax('/'.config('admin.route.prefix').'/api/categories?is_directory=0');

        $form->text('url', '超链接');
//        $form->text('icon', '图标');
        $form->textarea('description', '描述');
        $form->number('click_count', '点击率');

        return $form;
    }
}
