<script lang="ts">
    import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
    import type { NavItem } from '@/types';
    import { Link } from '@inertiajs/svelte';

    interface Props {
        items: NavItem[];
    }

    let { items = [] }: Props = $props();
</script>

<SidebarGroup class="px-2 py-0">
    <SidebarMenu>
        {#each items as item (item.title)}
            {#if item.isLabel}
                <SidebarGroupLabel>{item.title}</SidebarGroupLabel>
            {:else}
                <SidebarMenuItem>
                    <Link href={item.href ?? '#'} class="block w-full">
                        <SidebarMenuButton isActive={item.isActive} class="cursor-pointer">
                            {#if item.icon}
                                {@const Icon = item.icon}
                                <Icon class="h-4 w-4 shrink-0" />
                            {/if}
                            <span>{item.title}</span>
                        </SidebarMenuButton>
                    </Link>
                </SidebarMenuItem>
            {/if}
        {/each}
    </SidebarMenu>
</SidebarGroup>
