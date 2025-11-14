<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;
use Filament\Auth\Pages\Login;
use Filament\Support\Colors\Color;
use App\Filament\Pages\MyLoginPage;
use Filament\Widgets\AccountWidget;
use Filament\Auth\Pages\EditProfile;
use App\Filament\Pages\MyEditProfile;
use Illuminate\Support\Facades\Blade;
use App\Filament\Widgets\MyCustomWidget;
use Filament\Navigation\NavigationGroup;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Support\Facades\FilamentView;
use App\Filament\Pages\ThreeColumnsDashboard;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        // dd(get_class_methods($panel));
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(MyLoginPage::class)
            ->authGuard('admin')
            ->registration()
            ->colors([
                'primary' => Color::Red,
            ])
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\Filament\Admin\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->profile(MyEditProfile::class)
            ->simpleProfilePage(false)
            ->brandLogo(asset('images/book.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/book.png'))
            ->sidebarFullyCollapsibleOnDesktop()
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Library Management'),
                NavigationGroup::make()
                    ->label('Borrowing Management'),
                NavigationGroup::make()
                    ->label('Administration'),
            ])
            ->resourceCreatePageRedirect('index')
            // ->globalSearch(false)
            // ->globalSearchKeyBindings(['ctrl+q'])
            ;
    }











    public function register(): void
    {
        parent::register();
        FilamentView::registerRenderHook('panels::body.end', fn(): string => Blade::render("@vite('resources/js/app.js')"));
    }
    
}
